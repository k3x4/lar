<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_id', 'title', 'slug', 'description'];
    
    protected $appends = [
        'level',
        'listings_count'
    ];
    
    public function listings(){
        return $this->hasMany('App\Listing');
    }

    public function parent(){
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function childs(){
        return $this->hasMany('App\Category');
    }
    
    public function getLevel($level){
        if($this->parent){
            $level++;
            return $this->parent->getLevel($level);
        } else {
            return $level;
        }
    }

    public function getLevelAttribute(){
        return $this->getLevel(0);
    }

    public function getListingsCountAttribute(){
        if($this->category_id){
            return $this->listings()->count();
        } else {
            $ids = Category::where('category_id', $this->id)->get()->pluck('id')->toArray();
            return Listing::whereIn('category_id', $ids)->count();
        }
    }


}
