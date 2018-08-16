<?php

namespace App\Libraries;

use Request;
use Route;

class Bootstrap
{

    private static function checkActiveRoute($routePath, $parent){
        if(Route::has($routePath)){
            $routePath = \URL::route($routePath, [], false);
        }

        $routePath = ltrim($routePath, '/');
        $routePath = preg_replace('#\.index$#', '', $routePath);

        $requestCheck = Request::is($routePath);
        if($parent){
            $requestCheck = Request::is($routePath) || Request::is($routePath . '*');
        }

        return $requestCheck;
    }

    public static function activeClass($routeNames, $parent = false, $extraClasses = '')
    {
        $classes = $extraClasses;

        foreach ($routeNames as $routePath) {
            $requestCheck = self::checkActiveRoute($routePath, $parent);

            if ($requestCheck){//} || Request::is($routePath . '*')) {
                $classes .= ' ' . 'active';
                return 'class="' . $classes . '"';
            }
        }

        return 'class="' . $classes . '"';

    }

    public static function showBlock($routeNames, $parent = false)
    {
        foreach ($routeNames as $routePath) {
            $requestCheck = self::checkActiveRoute($routePath, $parent);

            if ($requestCheck){
                return 'style="display:block;"';
            }
        }
    }

}
