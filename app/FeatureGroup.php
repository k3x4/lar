<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureGroup extends Model
{
    protected $fillable = ['title'];

    protected $appends = [
        'count',
    ];

    public function features(){
        return $this->hasMany('App\Feature');
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    public function getCountAttribute(){
        return $this->features()->count();
    }

}
