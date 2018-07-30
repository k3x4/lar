<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MediaSize;

class Media extends Model
{
    // protected $appends = [
    //     'mini'
    // ];

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

    // public function getMiniAttribute(){
    //     return $this->get('mini');
    // }

}
