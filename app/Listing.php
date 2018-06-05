<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = ['title', 'slug', 'content'];
    
    public function categories(){
        return $this->hasMany('App\Category');
    }
}
