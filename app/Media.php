<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MediaSize;

class Media extends Model
{
    protected $appends = [
        'thumb'
    ];

    // this is a recommended way to declare event handlers
    protected static function boot() {
        parent::boot();

        static::deleting(function($media) { // before delete() method call this
             $media->thumbs()->delete();
             // do the rest of the cleanup...
        });
    }
    
    public function thumbs(){
        return $this->hasMany('App\Thumb');
    }

    public function listing(){
        return $this->belongsToMany('App\Listing');
    }

    public function get($tag){
        $media_size = MediaSize::where('tag', '=', $tag)->first();

        if(!$media_size){
            return $this->filename;
        } 

        $thumb = $this->thumbs()->where('media_size_id', '=', $media_size->id)->first();
        if($thumb){
            return $thumb->filename;
        }
        
        return $this->filename;
    }

    public static function getUnsorted($ids){
        $gallery = self::find($ids);
        $gallery = $gallery->sortBy(function($model) use ($ids) {
            return array_search($model->getKey(), $ids);
        });

        return $gallery;
    }

    public function getThumbAttribute(){
        return $this->get('mini');
    }

}
