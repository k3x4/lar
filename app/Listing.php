<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = ['title', 'slug', 'category_id', 'image_id', 'content', 'status'];

    protected $appends = [
        'thumb',
        'category',
        'author'
    ];
    
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function meta(){
        return $this->hasMany('App\ListingMeta');
    }

    public function media(){
        return $this->belongsToMany('App\Media');
    }

    public function getThumbAttribute(){
        $thumb = $this->image_id ? Media::find($this->image_id)->get('mini') : null;
        return $thumb;
    }

    public function getCategoryAttribute(){
        $category = $this->category_id ? Category::find($this->category_id) : null;
        return $category;
    }

    public function getAuthorAttribute(){
        $author = $this->author_id ? User::find($this->author_id) : null;
        return $author;
    }

    // public function thumbs(){
    //     return $this->hasMany('App\Thumb');
    // }
}
