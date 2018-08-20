<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldGroup extends Model
{
    protected $fillable = ['title'];

    protected $appends = [
        'count',
    ];

    public function fields(){
        return $this->hasMany('App\Field');
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    public function getCountAttribute(){
        return $this->fields()->count();
    }
}
