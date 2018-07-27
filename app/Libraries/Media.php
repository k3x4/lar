<?php

namespace App\Libraries;

use App\Media as MediaModel;
use App\Thumb;
use App\MediaSize;
use App\Libraries\Tools;
use App\Libraries\ImageUtils;

class Media
{

    public static function store($file)
    {
        $path = public_path('uploads');

        if (!is_dir($path)) {
            mkdir($path, 0777);
        }

        $name = sha1(date('YmdHis') . str_random(30));
        $save_name = $name . '.' . $file->getClientOriginalExtension();

        $file->move($path, $save_name);

        $media = new MediaModel();
        $media->filename = $save_name;
        $media->original_name = basename($file->getClientOriginalName());
        $media->save();

        if(Tools::isImage($path . '/' . $save_name)){
            self::makeThumbs($media->id, $save_name, $file->getClientOriginalExtension()); 
        }

        return $media;
    }

    private static function makeThumbs($media_id, $save_name, $extension){

        $path = public_path('uploads');
        $media_sizes = MediaSize::all();

        foreach($media_sizes as $media_size){

            if( ! $media_size->enabled ){
                continue;
            }

            $image = new ImageUtils($path . '/' .  $save_name);

            $media_width = $media_size->width;
            $media_height = $media_size->height;
            $image_width = $image->width();
            $image_height = $image->height();

            $image_size_max = ($image_width > $image_height) ? $image_width : $image_height;
            $media_size_max = ($media_width > $media_height) ? $media_width : $media_height;

            if ($image_size_max <= $media_size_max) {
                continue;
            }
    
            if ($media_size->crop) {
                $image->resizeCanvas($media_width, $media_height, $media_size->crop_position);
            } else {
                $image->resize($media_width, $media_height);
            }

            $name = sha1(date('YmdHis') . str_random(30));
            $resize_name = $name . '.' . $extension;

            $image->get()->save($path . '/' . $resize_name);

            $thumb = new Thumb();
            $thumb->media_id = $media_id;
            $thumb->media_size_id = $media_size->id;
            $thumb->filename = $resize_name;
            $thumb->save();

        }

    }

    public static function destroy($file){
        $path = public_path('uploads');

        // delete photos
        $filename = $path . '/' . $file->filename;

        if (file_exists($filename)) {
            unlink($filename);
        }

        // delete thumbs
        $thumbs = $file->thumbs()->get();
        foreach($thumbs as $thumb){
            $thumb = $path . '/' . $thumb->filename;
            if (file_exists($thumb)) {
                unlink($thumb);
            }
        }

        MediaModel::destroy($file->id);
    }

    

}
