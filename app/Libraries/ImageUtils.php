<?php

namespace App\Libraries;

use Image;

class ImageUtils
{

    private $image;

    public function __construct($path)
    {
        $this->image = Image::make($path)->orientate();
    }

    public function resize($width, $height)
    {
        $currentWidth = $this->image->width();
        $currentHeight = $this->image->height();

        if ($currentWidth > $currentHeight) {
            $this->image->widen($width);
        } else {
            $this->image->heighten($height);
        }
    }

    public function resizeCanvas($width, $height, $position = 'center')
    {
        $currentWidth = $this->image->width();
        $currentHeight = $this->image->height();

        $newWidth = null;
        $newHeight = null;

        if ($currentWidth > $width) {
            $newWidth = $width;
        }

        if ($currentHeight > $height) {
            $newHeight = $height;
        }

        if($newWidth && $newHeight){
            $this->image->fit($newWidth, $newHeight, null, $position);
        } else {
            $this->image->resizeCanvas($newWidth, $newHeight, $position);
        }
    }

    public function width()
    {
        return $this->image->width();
    }

    public function height()
    {
        return $this->image->height();
    }

    public function get()
    {
        return $this->image;
    }

}
