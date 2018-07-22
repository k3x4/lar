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
    private $listingFiles;
    private $mapFiles;

    public function getData($xmlFile){
        setlocale(LC_ALL, 'el_GR.UTF-8');

        $doc = new \DOMDocument();
        $doc->load($xmlFile);

        $root = $doc->getElementsByTagName('channel')->item(0);
        $this->data = $this->xml_to_array($root);
        //file_put_contents('aaaa.arr', var_export($this->data, true));exit();
    }

    public function xml_to_array($root) {
        $result = array();
    
        if ($root->hasAttributes()) {
            $attrs = $root->attributes;
            foreach ($attrs as $attr) {
                $result['@attributes'][$attr->name] = $attr->value;
            }
        }
    
        if ($root->hasChildNodes()) {
            $children = $root->childNodes;
            if ($children->length == 1) {
                $child = $children->item(0);
                if (in_array($child->nodeType, [XML_TEXT_NODE, XML_CDATA_SECTION_NODE])) {
                    $result['_value'] = $child->nodeValue;
                    return count($result) == 1
                        ? $result['_value']
                        : $result;
                }
            }
            $groups = array();
            foreach ($children as $child) {
                if($child->nodeType == XML_TEXT_NODE && empty(trim($child->nodeValue))) continue;
                if (!isset($result[$child->nodeName])) {
                    $result[$child->nodeName] = $this->xml_to_array($child);
                } else {
                    if (!isset($groups[$child->nodeName])) {
                        $result[$child->nodeName] = array($result[$child->nodeName]);
                        $groups[$child->nodeName] = 1;
                    }
                    $result[$child->nodeName][] = $this->xml_to_array($child);
                }
            }
        }
    
        return $result;
    }

    public function echoing($text){
        echo $text . "\r";
        @ob_flush();
        @flush();
    }

    public function itemsFilter($items, $filter){

        $items = array_filter($items, function($value, $key) use ($filter){
            $result_array = array_intersect_assoc($value, $filter);

            if(count($result_array) == count($filter)){
                return true;
            } 

            return false;
        }, ARRAY_FILTER_USE_BOTH);

        return $items;
    }

    public function getItems($rootElem, $filters){
        if(!$this->data){
            return null;
        }

        $items = $this->itemsFilter($this->data[$rootElem], $filters);
        return $items;
    }

    public function importCategories(){
        $parentCategories = $this->getItems('wp:term', [
            'wp:term_taxonomy' => 'pointfinderltypes',
            'wp:term_parent' => '',
        ]);

        $count = count($parentCategories);
        $index = 1;

        foreach($parentCategories as $categoryItem){
            $category = [
                'title'     => $categoryItem['wp:term_name'],
                'slug'      => $categoryItem['wp:term_slug'],
            ];

            $this->echoing('Import ' . $index++ . '/' . $count . ' Parent Categories');
            Category::create($category);
        }
        echo PHP_EOL;

        $allCategories = $this->getItems('wp:term', [
            'wp:term_taxonomy' => 'pointfinderltypes',
        ]);

        $count = count($allCategories);
        $index = 1;

        foreach($allCategories as $categoryItem){
            if(!$categoryItem['wp:term_parent']){
                $count--;
                continue;
            }
           
            $parentId = Category::where('slug', '=', $categoryItem['wp:term_parent'])->first()->id;
            $category = [
                'title'     => $categoryItem['wp:term_name'],
                'slug'      => $categoryItem['wp:term_slug'],
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

    public function mapListingFiles(){
        // $statement = DB::select("SHOW TABLE STATUS LIKE 'media'");
        // $nextId = $statement[0]->Auto_increment;

        $files = $this->getItems([
            'name' => 'item',
            'post_type' => 'attachment',
        ]);

        $count = count($files);
        $index = 1;

        foreach($files as $file){
            $fileId = intval($file['value']['post_parent']);

            $this->echoing('Map ' . $index++ . '/' . $count . ' Files');
            $this->listingFiles[$fileId][] = intval($file['value']['post_id']);
        }
        echo PHP_EOL;
        //file_put_contents('map.arr', var_export($this->mapFiles, true));
    }

    private function copyDir($source, $dest){
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
            $this->copyDir("$source/$entry", "$dest/$entry");
        }

        // Clean up
        $dir->close();
        return true;
    }

    private function removeDir($dir) { 
        if (is_dir($dir)) { 
          $objects = scandir($dir); 
          foreach ($objects as $object) { 
            if ($object != "." && $object != "..") { 
              if (is_dir($dir."/".$object))
                $this->removeDir($dir."/".$object);
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
            'post_type' => 'attachment',
        ]);

        $tempPathOrig = public_path('temp');
        $tempPath = public_path('temp1');

        if (is_dir($tempPath)) {
            $this->removeDir($tempPath);
        }

        $this->copyDir($tempPathOrig, $tempPath);

        $count = count($files);
        $index = 1;

        foreach($files as $file){
            $url = $file['value']['attachment_url'];
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
            $oldFileId = intval($file['value']['post_id']);
            $fileId = MediaLibrary::store($fileObj);
            $this->mapFiles[$oldFileId] = $fileId;
        }
        echo PHP_EOL;

    }

    public function importListings(){
        $listingItems = $this->getItems([
            'name' => 'item',
            'post_type' => 'listing',
            'status' => 'publish'
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

            $featuredImage = null;
            if(
                isset($listingItem['value']['postmeta']) &&
                isset($listingItem['value']['postmeta']['meta_key']// &&
                )
            ){
                $featuredImage = intval($listingItem['value']['postmeta']['_thumbnail_id']);
            }

            // $listing = [
            //     'title'         => $listingItem['value']['title'],
            //     'slug'          => $slug,
            //     'category_id'   => $categoryId,
            //     'image_id'      => $featuredImage,
            //     'content'       => $listingItem['value']['content_encoded'] ?: null
            // ];

            $this->echoing('Import ' . $index++ . '/' . $count . ' Listings');
            //Listing::create($listing);
            $listing = new Listing();
            $listing->title         = $listingItem['value']['title'];
            $listing->slug          = $slug;
            $listing->category_id   = $categoryId;
            $listing->image_id      = $featuredImage;
            $listing->content       = $listingItem['value']['content_encoded'] ?: null;
            
            $newListingId = $listing->save();
        }
        echo PHP_EOL;
    }

    public function import(){
        $this->importCategories();
        //$this->downloadFiles();
        //$this->mapListingFiles();
        //$this->storeFiles();
        //$this->importListings();
        return true;
    }

}
