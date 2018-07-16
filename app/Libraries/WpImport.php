<?php

namespace App\Libraries;

use App\Listing;
use App\Category;

class WpImport
{

    private $data;

    public function getData($xmlFile){
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
        //file_put_contents('aaaa.arr', var_export($result, true));//exit();
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

    public function importListings(){
        $listingItems = $this->getItems([
            'name' => 'item',
            'value' => [
                'status' => 'publish',
                'post_type' => 'listing',
            ],
        ]);

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

            $listing = [
                'title'         => $listingItem['value']['title'],
                'slug'          => $slug,
                'category_id'   => $categoryId,
                'content'       => $listingItem['value']['content_encoded'] ?: null
            ];

            Listing::create($listing);
        }
    }

    public function importCategories(){
        $parentCategories = $this->getItems([
            'name' => 'term',
            'value' => [
                'term_taxonomy' => 'pointfinderltypes',
                'term_parent' => '',
            ],
        ]);

        foreach($parentCategories as $categoryItem){
            $category = [
                'title'     => $categoryItem['value']['term_name'],
                'slug'      => $categoryItem['value']['term_slug'],
            ];

            Category::create($category);
        }

        $allCategories = $this->getItems([
            'name' => 'term',
            'value' => [
                'term_taxonomy' => 'pointfinderltypes',
            ],
        ]);

        foreach($allCategories as $categoryItem){
            if(!$categoryItem['value']['term_parent']){
                continue;
            }
           
            $parentId = Category::where('slug', '=', $categoryItem['value']['term_parent'])->first()->id;
            $category = [
                'title'     => $categoryItem['value']['term_name'],
                'slug'      => $categoryItem['value']['term_slug'],
                'category_id' => $parentId ? $parentId : null
            ];

            Category::create($category);
        }
    }

    public function import(){
        $this->importCategories();
        $this->importListings();
        return true;
    }

}
