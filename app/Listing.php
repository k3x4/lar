<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = ['category_id', 'title', 'slug', 'content', 'status'];
    
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function meta(){
        return $this->hasMany('App\ListingMeta');
    }

    public function media(){
        return $this->belongsToMany('App\Media');
    }

    // public function thumbs(){
    //     return $this->hasMany('App\Thumb');
    // }
}
