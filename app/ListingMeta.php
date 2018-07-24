<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListingMeta extends Model
{
    protected $fillable = ['meta_key', 'meta_value'];
    
    public function listing(){
        return $this->hasOne('App\Listing');
    }

}
