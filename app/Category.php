<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'display_name', 'description'];
    
    public function listings(){
        return $this->hasMany('App\Listing');
    }
}
