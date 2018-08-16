<?php

namespace App\Libraries;

use Request;
use Route;
use App\Category;

class Bootstrap
{
    private static $listingCategoryRoute;

    public static function setListing($listing){
        $category = $listing->category;
        if($category->category_id){ // CHILD
            $parentCategory = Category::find($category->category_id);
            self::$listingCategoryRoute = 'category' . '/' . $parentCategory->slug . '/' . $category->slug;
        } else {
            self::$listingCategoryRoute = 'category' . '/' . $category->slug;
        }
    }

    private static function checkActiveRoute($routePath){//, $parent){
        if(Route::has($routePath)){
            $routePath = \URL::route($routePath, [], false);
        }

        $routePath = ltrim($routePath, '/');
        $routePath = preg_replace('#\.index$#', '', $routePath);

        $requestCheck = Request::is($routePath) || Request::is($routePath . '*');
        if(self::$listingCategoryRoute){
            if(strpos(self::$listingCategoryRoute, $routePath) !== FALSE){
                $requestCheck = true;
            }
        }

        return $requestCheck;
    }

    public static function activeClass($routeNames, $extraClasses = '')//$parent = false, $extraClasses = '')
    {
        $classes = $extraClasses;

        foreach ($routeNames as $routePath) {
            $requestCheck = self::checkActiveRoute($routePath);//, $parent);

            if ($requestCheck){//} || Request::is($routePath . '*')) {
                $classes .= ' ' . 'active';
                return 'class="' . $classes . '"';
            }
        }

        return 'class="' . $classes . '"';

    }

    public static function showBlock($routeNames)//, $parent = false)
    {
        foreach ($routeNames as $routePath) {
            $requestCheck = self::checkActiveRoute($routePath);//, $parent);

            if ($requestCheck){
                return 'style="display:block;"';
            }
        }
    }

}
