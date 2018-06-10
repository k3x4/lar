<?php

namespace App\Libraries;

use Request;

class HtmlClasses
{

    public static function activeClass($routeNames, $parent = false, $activeClass = '', $extraClasses = '', $json = false)
    {

        $classes = $extraClasses;

        if($json){
            $routeNames = json_decode($routeNames);
        }

        foreach ($routeNames as $routeName) {
            $routePath = \URL::route($routeName, [], false);
            $routePath = ltrim($routePath, '/');
            $routePath = preg_replace('#\.index$#', '', $routePath);

            $requestCheck = Request::is($routePath);
            if($parent){
                $requestCheck = Request::is($routePath) || Request::is($routePath . '*');
            }

            if ($requestCheck){//} || Request::is($routePath . '*')) {
                $classes .= ' ' . $activeClass;
                return 'class="' . $classes . '"';
            }
        }

        return 'class="' . $classes . '"';

    }    

    public static function activeClassMenu($routeNames, $extraClasses = '', $json = true)
    {
        return self::activeClass($routeNames, false, 'm-menu__item--active', $extraClasses, $json);
    }

    public static function activeClassSubMenu($routeNames, $extraClasses = '', $json = true)
    {
        return self::activeClass($routeNames, true, 'm-menu__item--open m-menu__item--expanded', $extraClasses, $json);
    }


}
