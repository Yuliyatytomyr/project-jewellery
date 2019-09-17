<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'alias', 'category_id', 'name_ru', 'name_ua', 'image_thumb', 'image_full', 'desc_ru', 'desc_ua'
    ];

    /* relations */
    public function category()
    {
        return $this->belongsTo('\App\Models\Category');
    }

    public function params()
    {
        return $this->belongsToMany('App\Models\Param', 'subcategories_params', 'subcategory_id', 'param_id');
    }

    public function gproducts(){
        return $this->hasMany('App\Models\Gproduct', 'subcategory_id', 'id');
    }

    /* get translate cols for localization*/
    public function getNameTran(){
        $qwery = 'name_'.app()->getLocale();
        return $this->$qwery;
    }

    public function getDescTran(){
        $qwery = 'desc_'.app()->getLocale();
        return $this->$qwery;
    }
}
