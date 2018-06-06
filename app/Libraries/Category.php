<?php

namespace App\Libraries;

class Category
{

    public static function makeTree($parentCategories, $wrap = true, $dash = false, $list = []){
        foreach($parentCategories as $category){
            
            if($wrap){
                $category->display_name = self::wrapSubItem($category->display_name, $category->level, $dash);
            }
            
            $list[] = $category;
            if($category->childs){
                $list = $list + self::makeTree($category->childs, $wrap, $dash, $list);
            }

        }

        return $list;
    }

    public static function wrapSubItem($item, $level, $dash){
        if(!$level){
            return $item;
        }

        if($dash){
            return self::addDash($item, $level);
        }

        return self::wrapTag($item, $level, 'div', 'sub-item');
    }

    public static function wrapTag($text, $level, $tag, $class){
        $html = '';
        $htmlWrapBegin = '<' . $tag . ' class="' . $class . '">';
        $htmlWrapEnd = '</' . $tag . '>';

        for ($i = 0; $i < $level; $i++) {
            $html .= $htmlWrapBegin;
        }

        $html .= $text;

        for ($i = 0; $i < $level; $i++) {
            $html .= $htmlWrapEnd;
        }

        return $html;
    }

    public static function addDash($text, $level, $symbol = '─'){
        $symbols = '';
        for ($i = 0; $i < $level; $i++) {
            $symbols = $symbol . $symbols;
        }

        return $symbols . ' ' . $text;
    }

}
