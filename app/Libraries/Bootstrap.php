<?php

namespace App\Libraries;

use Request;

class Bootstrap {

    public static function activeClass($routeName, $extraClasses = ''){
        $classes = $extraClasses;
        if (Request::is($routeName)) {
            $classes .= ' ' . 'active';
        }
        return 'class="' . $classes . '"';
    }

}
