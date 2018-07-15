<?php

namespace App\Libraries;

use App\Listing;
use App\Category;
use Sabre\Xml\Service as XmlService;

class WpImport
{

    private $data;

    public function getData($xmlFile){
        $xmlData = file_get_contents($xmlFile);
        //$xmlData = $this->simplexml_load_string_nons($xmlData);

        //$json = json_encode($xmlData);
        //$this->data = json_decode($json, true);
        $xmlService = new XmlService();

        $xmlService->elementMap = [
            '{}item'                                        => 'Sabre\Xml\Deserializer\keyValue',
            '{http://wordpress.org/export/1.2/}author'      => 'Sabre\Xml\Deserializer\keyValue',
            '{http://wordpress.org/export/1.2/}category'    => 'Sabre\Xml\Deserializer\keyValue',
            '{http://wordpress.org/export/1.2/}term'        => 'Sabre\Xml\Deserializer\keyValue',
            '{http://wordpress.org/export/1.2/}tag'         => 'Sabre\Xml\Deserializer\keyValue',
            '{http://wordpress.org/export/1.2/}postmeta'    => 'Sabre\Xml\Deserializer\keyValue',
        ];

        $result = $xmlService->parse($xml);

        $result = json_encode($result);
        $result = preg_replace('/"{[^}]*}/', '"', $result);
        $result = json_decode($result, true);

        $this->data = $result;
    }

    // private function simplexml_load_string_nons($xml, $sxclass = 'SimpleXMLElement', $nsattr = false, $flags = null){
    //     // Validate arguments first
    //     if(!is_string($sxclass) or empty($sxclass) or !class_exists($sxclass)){
    //         trigger_error('$sxclass must be a SimpleXMLElement or a derived class.', E_USER_WARNING);
    //         return false;
    //     }
    //     if(!is_string($xml) or empty($xml)){
    //         trigger_error('$xml must be a non-empty string.', E_USER_WARNING);
    //         return false;
    //     }
    //     // Load XML if URL is provided as XML
    //     if(preg_match('~^https?://[^\s]+$~i', $xml) || file_exists($xml)){
    //         $xml = file_get_contents($xml);
    //     }
    //     // Let's drop namespace definitions
    //     if(stripos($xml, 'xmlns=') !== false){
    //         $xml = preg_replace('~[\s]+xmlns=[\'"].+?[\'"]~i', null, $xml);
    //     }
    //     // I know this looks kind of funny but it changes namespaced attributes
    //     if(preg_match_all('~xmlns:([a-z0-9]+)=~i', $xml, $matches)){
    //         foreach(($namespaces = array_unique($matches[1])) as $namespace){
    //             $escaped_namespace = preg_quote($namespace, '~');
    //             $xml = preg_replace('~[\s]xmlns:'.$escaped_namespace.'=[\'].+?[\']~i', null, $xml);
    //             $xml = preg_replace('~[\s]xmlns:'.$escaped_namespace.'=["].+?["]~i', null, $xml);
    //             $xml = preg_replace('~([\'"\s])'.$escaped_namespace.':~i', '$1'.$namespace.'_', $xml);
    //         }
    //     }
    //     // Let's change <namespace:tag to <namespace_tag ns="namespace"
    //     $regexfrom = sprintf('~<([a-z0-9]+):%s~is', !empty($nsattr) ? '([a-z0-9]+)' : null);
    //     $regexto = strlen($nsattr) ? '<$1_$2 '.$nsattr.'="$1"' : '<$1_';
    //     $xml = preg_replace($regexfrom, $regexto, $xml);
    //     // Let's change </namespace:tag> to </namespace_tag>
    //     $xml = preg_replace('~</([a-z0-9]+):~is', '</$1_', $xml);
    //     // Default flags I use
    //     if(empty($flags)) $flags = LIBXML_COMPACT | LIBXML_NOBLANKS | LIBXML_NOCDATA;
    //     // Now load and return (namespaceless)
    //     return $xml = simplexml_load_string($xml, $sxclass, $flags);
    // }

    public function itemsFilter($items, $filters){
        if(!$filters){
            return $items;
        }

        foreach($filters as $key => $value){
            $items = array_filter($items, function($item) use ($key, $value){
                if(!isset($item[$key])){
                    return true;
                }

                return ($item[$key] == $value) ? true : false;
            }, ARRAY_FILTER_USE_BOTH);
        }

        return $items;
    }

    public function getPosts($filters = []){
        if(!$this->data){
            return null;
        }

        $items = $this->data['channel']['item'];
        $items = $this->itemsFilter($items, $filters);

        return $items;
    }

    public function getTerms($filters = []){
        if(!$this->data){
            return null;
        }

        $items = $this->data['channel']['wp_term'];
        $items = $this->itemsFilter($items, $filters);

        return $items;
    }

    public function importListings(){
        $listingItems = $this->getPosts([
            'wp_post_type'  => 'listing',
            'wp_status'     => 'publish'
        ]);

        foreach($listingItems as $listingItem){
            $slug = trim($listingItem['link']);
            $slug = trim($slug, '/');
            $slug = explode('/', $slug);
            $slug = end($slug);

            $categoryId = null;
            
            if(isset($listingItem['category'])){
                $category = Category::where('title', '=', $listingItem['category'])->first();
                if($category){
                    $categoryId = $category->id;
                }
            }

            $listing = [
                'title'         => $listingItem['title'],
                'slug'          => $slug,
                'category_id'   => $categoryId,
                'content'       => $listingItem['content_encoded'] ?: null
            ];

            Listing::create($listing);
        }
    }

    public function importParentCategories(){
        $parentCategories = $this->getTerms([
            'wp_term_taxonomy'  => 'pointfinderltypes',
            'wp_term_parent' => []
        ]);

        foreach($parentCategories as $categoryItem){
            $category = [
                'title'     => $categoryItem['wp_term_name'],
                'slug'      => $categoryItem['wp_term_slug']
            ];

            Category::create($category);
        }
    }

    public function importChildCategories(){
        $parentCategories = $this->getTerms([
            'wp_term_taxonomy'  => 'pointfinderltypes',
            'wp_term_parent' => ![]
        ]);

        foreach($parentCategories as $categoryItem){
            $parentId = Category::where('slug', '=', $categoryItem['wp_term_parent'])->first()->id;
            $category = [
                'title'         => $categoryItem['wp_term_name'],
                'slug'          => $categoryItem['wp_term_slug'],
                'category_id'   => $parentId
            ];

            Category::create($category);
        }
    }

    public function import(){
        //$this->importParentCategories();
        //his->importChildCategories();
        //$this->importListings();
        return true;
    }

}
