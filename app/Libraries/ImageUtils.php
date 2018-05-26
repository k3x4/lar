<?php

namespace App\Libraries;

use Image;

class ImageUtils {
    
    private $image;
    
    public function __construct($path) {
        $this->image = Image::make($path)->orientate();
    }

    public function resize($width, $height) {
        $currentWidth = $this->image->width();
        $currentHeight = $this->image->height();

        if ($currentWidth > $currentHeight) {
            $this->image->widen($width);
        } else {
            $this->image->heighten($height);
        }
    }
    
    public function fit($width, $height, $position = 'center'){
        $this->image->fit($width, $height, null, $position);
    }
    
    public function width(){
        return $this->image->width();
    }
    
    public function height(){
        return $this->image->height();
    }
    
    public function get(){
        return $this->image;
    }

}
