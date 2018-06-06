<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['display_name', 'name', 'description'];
    protected $appends = ['level'];
    
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


}
