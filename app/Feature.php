<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['feature_group_id', 'title'];

    protected $appends = [
        'feature_group',
    ];

    public function featureGroup(){
        return $this->belongsTo('App\FeatureGroup');
    }

    public function listings(){
        return $this->belongsToMany('App\Listing');
    }

    public function getFeatureGroupAttribute(){
        $feature_group = $this->featureGroup()->first();
        return $feature_group;
    }

}
