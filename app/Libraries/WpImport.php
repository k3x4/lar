<?php

namespace App\Libraries;

use DB;
use App\Listing;
use App\Category;
use App\Media;
use Illuminate\Http\UploadedFile;
use App\Libraries\Media as MediaLibrary;

class WpImport
{

    private $data;
    private $mapFiles;

    public function getData($xmlFile){
        setlocale(LC_ALL, 'el_GR.UTF-8');

        $xmlData = file_get_contents($xmlFile);
        $service = new \Sabre\Xml\Service();

        $service->elementMap = [
            '{}item'                                        => '\Sabre\Xml\Deserializer\keyValue',
            '{http://wordpress.org/export/1.2/}author'      => '\Sabre\Xml\Deserializer\keyValue',
            '{http://wordpress.org/export/1.2/}category'    => '\Sabre\Xml\Deserializer\keyValue',
            '{http://wordpress.org/export/1.2/}term'        => '\Sabre\Xml\Deserializer\keyValue',
            '{http://wordpress.org/export/1.2/}tag'         => '\Sabre\Xml\Deserializer\keyValue',
            '{http://wordpress.org/export/1.2/}postmeta'    => '\Sabre\Xml\Deserializer\keyValue',
        ];

        $result = $service->parse($xmlData);

        $result = json_encode($result);
        $result = str_replace('content\/}encoded', '\/}content_encoded', $result);
        $result = str_replace('excerpt\/}encoded', '\/}excerpt_encoded', $result);
        $result = preg_replace('/"{[^}]*}/', '"', $result);
        $result = json_decode($result, true);

        $this->data = $result;
        $this->mapFiles = [];

        //file_put_contents('ΔέΓουστάρει.txt','f');exit();
        //file_put_contents('aaaa.arr', var_export($result, true));exit();
    }

    public function echoing($text){
        echo $text . "\r";
        @ob_flush();
        @flush();
    }

    public function itemsFilter($items, $filters){
        if(!$filters){
            return $items;
        }

        foreach($filters as $key => $value){
            $items = array_filter($items, function($item) use ($key, $value){
                if(!isset($item[$key])){
                    return true;
                }

                if(is_array($item[$key])){
                    $result_array = array_intersect_assoc($item[$key], $value);

                    if(count($result_array) == count($value)){
                        return true;
                    } else {
                        return false;
                    }

                    return count($result_array);
                }

                return ($item[$key] == $value) ? true : false;
            }, ARRAY_FILTER_USE_BOTH);
        }

        return $items;
    }

    public function getItems($filters = []){
        if(!$this->data){
            return null;
        }

        $items = $this->data[0]['value'];
        $items = $this->itemsFilter($items, $filters);

        return $items;
    }

    public function importCategories(){
        $parentCategories = $this->getItems([
            'name' => 'term',
            'value' => [
                'term_taxonomy' => 'pointfinderltypes',
                'term_parent' => '',
            ],
        ]);

        $count = count($parentCategories);
        $index = 1;

        foreach($parentCategories as $categoryItem){
            $category = [
                'title'     => $categoryItem['value']['term_name'],
                'slug'      => $categoryItem['value']['term_slug'],
            ];

            $this->echoing('Import ' . $index++ . '/' . $count . ' Parent Categories');
            Category::create($category);
        }
        echo PHP_EOL;

        $allCategories = $this->getItems([
            'name' => 'term',
            'value' => [
                'term_taxonomy' => 'pointfinderltypes',
            ],
        ]);

        $count = count($allCategories);
        $index = 1;

        foreach($allCategories as $categoryItem){
            if(!$categoryItem['value']['term_parent']){
                $count--;
                continue;
            }
           
            $parentId = Category::where('slug', '=', $categoryItem['value']['term_parent'])->first()->id;
            $category = [
                'title'     => $categoryItem['value']['term_name'],
                'slug'      => $categoryItem['value']['term_slug'],
                'category_id' => $parentId ? $parentId : null
            ];

            $this->echoing('Import ' . $index++ . '/' . $count . ' Child Categories');
            Category::create($category);
        }
        echo PHP_EOL;
    }

    public function downloadFiles(){
        $tempPath = public_path('temp');

        if (!is_dir($tempPath)) {
            mkdir($tempPath, 0777);
        } else {
            return true;
        }

        $files = $this->getItems([
            'name' => 'item',
            'value' => [
                'post_type' => 'attachment',
            ],
        ]);

        $count = count($files);
        $index = 1;

        foreach($files as $file){
            //if(++$i <= 69) continue;
            //if($i >= 72) exit();
            $url = $file['value']['attachment_url'];
            $url = mb_convert_encoding($url, 'UTF-8', mb_detect_encoding($url, 'UTF-8', true));
            // $filename = explode('/', $url);
            // $filename = end($filename);
            $filename = parse_url($url);
            $filename = $filename['path'];
            $filename = $tempPath . $filename;

            if (!is_dir(dirname($filename))) {
                mkdir(dirname($filename), 0777, true);
            }

            $url = mb_convert_encoding($url, 'UTF-8', mb_detect_encoding($url, 'UTF-8', true));
            //$filename = mb_convert_encoding($filename, 'UTF-8', mb_detect_encoding($filename, 'UTF-8', true));
            //$filename = mb_convert_encoding($filename, 'ASCII//TRANSLIT', mb_detect_encoding($filename, 'UTF-8', true));
            //$filename = mb_convert_encoding($filename, 'Windows-1253', mb_detect_encoding($filename, 'UTF-8', true));
            //$filename = iconv("UTF-8", "cp1253", $filename);

            $this->echoing('Download ' . $index++ . '/' . $count . ' File');
            //file_put_contents('aaa.txt', $filename.PHP_EOL, FILE_APPEND);
            //file_put_contents($filename , file_get_contents($url));

            $ch = curl_init($url);
            $fp = fopen($filename, 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $data = curl_exec($ch);
            curl_close($ch);
            fclose($fp);
            //file_put_contents($filename , $data);
        }
        echo PHP_EOL;
        
    }

    // public function mapFiles(){
    //     $statement = DB::select("SHOW TABLE STATUS LIKE 'media'");
    //     $nextId = $statement[0]->Auto_increment;

    //     $files = $this->getItems([
    //         'name' => 'item',
    //         'value' => [
    //             'post_type' => 'attachment',
    //         ],
    //     ]);

    //     $count = count($files);
    //     $index = 1;

    //     foreach($files as $file){
    //         $fileId = intval($file['value']['post_parent']);

    //         $this->echoing('Map ' . $index++ . '/' . $count . ' Files');
    //         $this->mapFiles[$fileId] = $nextId++;
    //     }
    //     echo PHP_EOL;
    // }

    private function copyr($source, $dest){
        // Check for symlinks
        if (is_link($source)) {
            return symlink(readlink($source), $dest);
        }
        
        // Simple copy for a file
        if (is_file($source)) {
            return copy($source, $dest);
        }

        // Make destination directory
        if (!is_dir($dest)) {
            mkdir($dest);
        }

        // Loop through the folder
        $dir = dir($source);
        while (false !== $entry = $dir->read()) {
            // Skip pointers
            if ($entry == '.' || $entry == '..') {
                continue;
            }

            // Deep copy directories
            $this->copyr("$source/$entry", "$dest/$entry");
        }

        // Clean up
        $dir->close();
        return true;
    }

    private function rrmdir($dir) { 
        if (is_dir($dir)) { 
          $objects = scandir($dir); 
          foreach ($objects as $object) { 
            if ($object != "." && $object != "..") { 
              if (is_dir($dir."/".$object))
                $this->rrmdir($dir."/".$object);
              else
                unlink($dir."/".$object); 
            } 
          }
          rmdir($dir); 
        } 
    }

    public function isImage($path){
		$a = getimagesize($path);
		$image_type = $a[2];
     
		if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
		{
			return true;
		}
		return false;
	}

    public function storeFiles(){
        $files = $this->getItems([
            'name' => 'item',
            'value' => [
                'post_type' => 'attachment',
            ],
        ]);

        $tempPathOrig = public_path('temp');
        $tempPath = public_path('temp1');

        if (is_dir($tempPath)) {
            $this->rrmdir($tempPath);
        }

        $this->copyr($tempPathOrig, $tempPath);

        $count = count($files);
        $index = 1;

        foreach($files as $file){
            $url = $file['value']['attachment_url'];
            // $filename = explode('/', $url);
            // $filename = end($filename);
            $filename = parse_url($url);
            $filename = $filename['path'];
            $filename = $tempPath . $filename;

            // if(!$this->isImage($filename)){
            //     continue;
            // }

            $fileObj = new UploadedFile(
                $filename,
                basename($filename),
                mime_content_type($filename),
                filesize($filename),
                null,
                true
            );

            $this->echoing('Store ' . $index++ . '/' . $count . ' Files');
            $postId = intval($file['value']['post_parent']);
            $fileId = MediaLibrary::store($fileObj);

            if(isset($this->mapFiles[$postId])){
                if(is_array($this->mapFiles[$postId])){
                    $this->mapFiles[$postId][] = $fileId;
                } else {
                    $arr = [];
                    $arr[] = $this->mapFiles[$postId];
                    $arr[] = $fileId;
                    $this->mapFiles[$postId] = $arr;
                }
            } else {
                $this->mapFiles[$postId] = $fileId;
            }
        }
        echo PHP_EOL;

    }

    public function importListings(){
        $listingItems = $this->getItems([
            'name' => 'item',
            'value' => [
                'status' => 'publish',
                'post_type' => 'listing',
            ],
        ]);

        $files = $this->getItems([
            'name' => 'item',
            'value' => [
                'post_type' => 'attachment',
            ],
        ]);

        $count = count($listingItems);
        $index = 1;

        foreach($listingItems as $listingItem){
            $slug = trim($listingItem['value']['link']);
            $slug = trim($slug, '/');
            $slug = explode('/', $slug);
            $slug = end($slug);

            $categoryId = null;
            
            if(isset($listingItem['value']['category'])){
                $category = Category::where('title', '=', $listingItem['value']['category'])->first();
                if($category){
                    $categoryId = $category->id;
                }
            }

            // $listing = [
            //     'title'         => $listingItem['value']['title'],
            //     'slug'          => $slug,
            //     'category_id'   => $categoryId,
            //     'content'       => $listingItem['value']['content_encoded'] ?: null
            // ];

            $fileMapParentId = intval($listingItem['value']['post_id']);
            $file = isset($this->mapFiles[$fileMapParentId]) ? $this->mapFiles[$fileMapParentId] : null;

            $this->echoing('Import ' . $index++ . '/' . $count . ' Listings');
            //Listing::create($listing);
            $listing = new Listing();
            $listing->title         = $listingItem['value']['title'];
            $listing->slug          = $slug;
            $listing->category_id   = $categoryId;
            $listing->content       = $listingItem['value']['content_encoded'] ?: null;
            
            $newListingId = $listing->save();

            if($file){
                if(is_array($file)){
                    foreach($file as $f){
                        $media = Media::find($f);
                        $filepath = public_path('uploads') . '/' . $media->filename;
                        if(!$this->isImage($filepath)){
                            $listing->featuredImage()->attach($media->id);
                            break;
                        }
                    }
                } else {
                    $media = Media::find($file);
                    $filepath = public_path('uploads') . '/' . $media->filename;
                    if(!$this->isImage($filepath)){
                        $listing->featuredImage()->attach($media->id);
                    }
                }
            }
            
        }
        echo PHP_EOL;
    }

    public function import(){
        $this->importCategories();
        $this->downloadFiles();
        //$this->mapFiles();
        $this->storeFiles();
        $this->importListings();
        return true;
    }

}
