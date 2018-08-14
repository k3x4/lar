<?php

namespace App\Libraries;

class Category
{

    public static function makeTree($parentCategories, $wrap = true, $list = []){
        foreach($parentCategories as $category){
            
            if($category->level){
                $category->title = self::wrapTag($category->title, $category->level, 'div', 'sub-item');
            }
            
            $list[] = $category;
            $list = $list + self::makeTree($category->childs()->orderBy('title', 'ASC')->get(), $wrap, $list);

        }

        return $list;
    }

    public static function makeOptions($categories, $exclude = null){
        $list = [];
        foreach($categories as $category){

            if($exclude == $category->id){
                continue;
            }

            $list[$category->id] = $category->title;
        }

        return $list;
    }

    public static function makeOptionGroup($parentCategories, $exclude = null, $list = []){
        foreach($parentCategories as $category){

            if($exclude == $category->id){
                continue;
            }

            $list[$category->title] = [];
            foreach($category->childs as $child){
                if($exclude == $child->id){
                    continue;
                }

                $list[$category->title][$child->id] = $child->title;
            }
        
        }

        return $list;
    }

    public static function makeListSlugs($parentCategories, $list = []){
        setlocale(LC_ALL, 'el_GR.UTF-8');
        foreach($parentCategories as $category){

            $list[$category->title . '|' . $category->slug] = [];
            foreach($category->childs as $child){
                $list[$category->title . '|' . $category->slug][$child->slug] = $child->title;
                //usort($list[$category->title . '|' . $category->slug], 'App\Libraries\Category::sortByTitle');
                array_multisort($list[$category->title . '|' . $category->slug], SORT_ASC, SORT_LOCALE_STRING);
            }
        
        }

        return $list;
    }

    public static function wrapTag($text, $level, $tag, $class){
        $html = '';
        // $htmlWrapBegin = '<' . $tag . ' class="' . $class . '">';
        // $htmlWrapEnd = '</' . $tag . '>';

        for ($i = 0; $i < $level; $i++) {
            $html .= '└─ ';// $htmlWrapBegin;
        }

        $html .= $text;

        // for ($i = 0; $i < $level; $i++) {
        //     $html .= $htmlWrapEnd;
        // }

        return $html;
    }

    public static function sortByTitle($a, $b) {
        return strcmp($a, $b);
    }


}
