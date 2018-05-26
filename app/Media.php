<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public function thumbs(){
        return $this->hasMany('App\Thumb');
    }
}
