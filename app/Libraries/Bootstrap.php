<?php

namespace App\Libraries;

use Request;

class Bootstrap
{

    public static function activeClass($routeNames, $parent = false, $extraClasses = '')
    {
        $classes = $extraClasses;

        foreach ($routeNames as $routeName) {
            $routePath = \URL::route($routeName, [], false);
            $routePath = ltrim($routePath, '/');
            $routePath = preg_replace('#\.index$#', '', $routePath);

            $requestCheck = Request::is($routePath);
            if($parent){
                $requestCheck = Request::is($routePath) || Request::is($routePath . '*');
            }

            if ($requestCheck){//} || Request::is($routePath . '*')) {
                $classes .= ' ' . 'active';
                return 'class="' . $classes . '"';
            }
        }

        return 'class="' . $classes . '"';

    }

}
