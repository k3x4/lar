<?php

namespace App\Libraries;

use Request;

class Bootstrap
{

<<<<<<< HEAD
    public static function activeClass($routeNames, $parent = false, $extraClasses = '')
=======
    public static function activeClass($routeNames, $extraClasses = '')
>>>>>>> be3329743dab2f284ff175d8ae0ccfd180e991b4
    {
        $classes = $extraClasses;

        foreach ($routeNames as $routeName) {
            $routePath = \URL::route($routeName, [], false);
            $routePath = ltrim($routePath, '/');
<<<<<<< HEAD
            $routePath = preg_replace('#\.index$#', '', $routePath);

            $requestCheck = Request::is($routePath);
            if($parent){
                $requestCheck = Request::is($routePath) || Request::is($routePath . '*');
            }

            if ($requestCheck){//} || Request::is($routePath . '*')) {
=======
            if (Request::is($routePath) || Request::is($routePath . '*')) {
>>>>>>> be3329743dab2f284ff175d8ae0ccfd180e991b4
                $classes .= ' ' . 'active';
                return 'class="' . $classes . '"';
            }
        }

        return 'class="' . $classes . '"';

    }

}
