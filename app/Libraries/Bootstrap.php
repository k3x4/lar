<?php

namespace App\Libraries;

use Request;

class Bootstrap
{

    public static function activeClass($routeNames, $extraClasses = '')
    {
        $classes = $extraClasses;

        foreach ($routeNames as $routeName) {
            $routePath = \URL::route($routeName, [], false);
            $routePath = ltrim($routePath, '/');
            if (Request::is($routePath) || Request::is($routePath . '*')) {
                $classes .= ' ' . 'active';
                return 'class="' . $classes . '"';
            }
        }

        return 'class="' . $classes . '"';

    }

}
