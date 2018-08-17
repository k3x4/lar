<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureGroup extends Model
{
    protected $fillable = ['title', 'description', 'status'];

    public function features(){
        return $this->hasMany('App\Feature');
    }

}
