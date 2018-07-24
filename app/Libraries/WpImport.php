<?php

namespace App\Libraries;

use DB;
use App\Listing;
use App\Category;
use App\Media;
use Illuminate\Http\UploadedFile;
use App\Libraries\Tools;
use App\Libraries\Media as MediaLibrary;

class WpImport
{
    private $data;
    //private $listingFiles;
    private $mapFiles;

    public function getData($xmlFile){
        setlocale(LC_ALL, 'el_GR.UTF-8');

        $doc = new \DOMDocument();
        $doc->load($xmlFile);

        $root = $doc->getElementsByTagName('channel')->item(0);
        $this->data = $this->xmlToArray($root);
        //file_put_contents('all.arr', var_export($this->data, true));//exit();
    }

    public function xmlToArray($root) {
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
                    $result[$child->nodeName] = $this->xmlToArray($child);
                } else {
                    if (!isset($groups[$child->nodeName])) {
                        $result[$child->nodeName] = array($result[$child->nodeName]);
                        $groups[$child->nodeName] = 1;
                    }
                    $result[$child->nodeName][] = $this->xmlToArray($child);
                }
            }
        }
    
        return $result;
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

            Tools::echoing('Import ' . $index++ . '/' . $count . ' Parent Categories');
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

            Tools::echoing('Import ' . $index++ . '/' . $count . ' Child Categories');
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

        $files = $this->getItems('item', [
            'wp:post_type' => 'attachment'
        ]);

        $count = count($files);
        $index = 1;

        foreach($files as $file){
            $url = $file['wp:attachment_url'];
            $url = mb_convert_encoding($url, 'UTF-8', mb_detect_encoding($url, 'UTF-8', true));

            $filename = parse_url($url);
            $filename = $filename['path'];
            $filename = $tempPath . $filename;

            if (!is_dir(dirname($filename))) {
                mkdir(dirname($filename), 0777, true);
            }

            $url = mb_convert_encoding($url, 'UTF-8', mb_detect_encoding($url, 'UTF-8', true));

            Tools::echoing('Download ' . $index++ . '/' . $count . ' File');

            $ch = curl_init($url);
            $fp = fopen($filename, 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $data = curl_exec($ch);
            curl_close($ch);
            fclose($fp);
        }
        echo PHP_EOL;
        
    }

    // public function mapListingFiles(){
    //     $files = $this->getItems('item',[
    //         'wp:post_type' => 'attachment'
    //     ]);

    //     $this->listingFiles = [];

    //     $count = count($files);
    //     $index = 1;

    //     foreach($files as $file){
    //         $fileId = intval($file['wp:post_parent']);

    //         Tools::echoing('Map ' . $index++ . '/' . $count . ' Files');
    //         $this->listingFiles[$fileId][] = intval($file['wp:post_id']);
    //     }
    //     echo PHP_EOL;
    //     //file_put_contents('map.arr', var_export($this->listingFiles, true));
    // }

    private function filterMeta($item, $metaKey, $integerValues = false, $oldFiles = false){
        $result = [];

        if(isset($item['wp:postmeta'])){
            $metas = $item['wp:postmeta'];
            foreach($metas as $meta){
                if($meta['wp:meta_key'] == $metaKey){
                    $result[] = $meta['wp:meta_value'];
                }
            }
        }

        if($integerValues && $result){
            $result = array_map('intval', $result);
        }

        if($oldFiles && $result){
            $result = array_map([$this, 'mapFiles'], $result);
        }

        return $result ?: null;
    }

    public function mapFiles($item){
        return $this->mapFiles[$item];
    }

    public function storeFiles(){
        $files = $this->getItems('item',[
            'wp:post_type' => 'attachment',
        ]);

        $tempPathOrig = public_path('temp');
        $tempPath = public_path('temp1');

        if (is_dir($tempPath)) {
            Tools::removeDir($tempPath);
        }

        Tools::copyDir($tempPathOrig, $tempPath);

        $this->mapFiles = [];

        $count = count($files);
        $index = 1;

        foreach($files as $file){
            $url = $file['wp:attachment_url'];
            $filename = parse_url($url);
            $filename = $filename['path'];
            $filename = $tempPath . $filename;

            // if(!Tools::isImage($filename)){
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

            Tools::echoing('Store ' . $index++ . '/' . $count . ' Files');
            $oldFileId = intval($file['wp:post_id']);
            $fileId = MediaLibrary::store($fileObj);
            $this->mapFiles[$oldFileId] = $fileId;
        }
        echo PHP_EOL;

    }

    public function importListings(){
        $listingItems = $this->getItems('item', [
            'wp:post_type' => 'listing',
            'wp:status' => 'publish'
        ]);


        $files = $this->getItems('item', [
            'wp:post_type' => 'attachment',
        ]);

        $count = count($listingItems);
        $index = 1;

        foreach($listingItems as $listingItem){
            $slug = trim($listingItem['link']);
            $slug = trim($slug, '/');
            $slug = explode('/', $slug);
            $slug = end($slug);

            $categoryId = null;
            
            if(
                isset($listingItem['category']) &&
                isset($listingItem['category']['@attributes']) &&
                isset($listingItem['category']['@attributes']['nicename'])
            ){
                $category = Category::where('slug', '=', $listingItem['category']['@attributes']['nicename'])->first();
                if($category){
                    $categoryId = $category->id;
                }
            }

            $featuredImage = null;
            $featuredImage = $this->filterMeta($listingItem, '_thumbnail_id', true, true);
            $featuredImage = $featuredImage ? current($featuredImage) : null;

            // if(isset($listingItem['wp:postmeta'])){
            //     $metas = $listingItem['wp:postmeta'];
            //     foreach($metas as $meta){
            //         if($meta['wp:meta_key'] == '_thumbnail_id'){
            //             $featuredImage = intval($meta['wp:meta_value']);
            //             $featuredImage = $this->mapFiles[$featuredImage];
            //             break;
            //         }
            //     }
            // }

            // $listing = [
            //     'title'         => $listingItem['value']['title'],
            //     'slug'          => $slug,
            //     'category_id'   => $categoryId,
            //     'image_id'      => $featuredImage,
            //     'content'       => $listingItem['value']['content_encoded'] ?: null
            // ];

            Tools::echoing('Import ' . $index++ . '/' . $count . ' Listings');
            //Listing::create($listing);
            $listing = new Listing();
            $listing->title         = $listingItem['title'];
            $listing->slug          = $slug;
            $listing->category_id   = $categoryId;
            $listing->image_id      = $featuredImage;
            $listing->content       = $listingItem['content:encoded'] ?: null;
            $listing->save();
            
            //$newListingId = $listing->save();

            // $oldPostId = $listingItem['wp:post_id'];
            // if(isset($this->listingFiles[$oldPostId])){
            //     $newKeys = [];
            //     foreach($this->listingFiles[$oldPostId] as $oldFileKey){
            //         $newKeys[] = $this->mapFiles[$oldFileKey];
            //     }
            //     //$listing->media()->attach($newKeys);
            // }

            // if(isset($listingItem['wp:postmeta'])){
            //     $metas = $listingItem['wp:postmeta'];
            //     $gallery = [];
            //     foreach($metas as $meta){
            //         if($meta['wp:meta_key'] == 'webbupointfinder_item_images'){
            //             $imageId = intval($meta['wp:meta_value']);
            //             $gallery[] = $this->mapFiles[$imageId];
            //         }
            //     }
            //     if($gallery){
            //         $listing->meta()->create([
            //             'meta_key' => 'gallery',
            //             'meta_value' => serialize($gallery);
            //         ]);
            //     }
            // }

            $gallery = null;
            $gallery = $this->filterMeta($listingItem, 'webbupointfinder_item_images', true, true);

            if($gallery){
                $listing->meta()->create([
                    'meta_key' => 'gallery',
                    'meta_value' => serialize($gallery)
                ]);
            }

        }
        echo PHP_EOL;
    }

    public function import(){
        $this->importCategories();
        $this->downloadFiles();
        //$this->mapListingFiles(); // REQUIRED?
        $this->storeFiles();
        $this->importListings();
        return true;
    }

}
