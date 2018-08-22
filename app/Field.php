<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = ['field_group_id', 'title'];

    protected $appends = [
        'field_group',
        //'default_options'
    ];

    public function fieldGroup(){
        return $this->belongsTo('App\FieldGroup');
    }

    public function listings(){
        return $this->belongsToMany('App\Listing');
    }

    public function getFieldGroupAttribute(){
        $field_group = $this->fieldGroup()->first();
        return $field_group;
    }

    // public function getDefaultOptionsAttribute(){
    //     return unserialize($this->options);
    // }

}
