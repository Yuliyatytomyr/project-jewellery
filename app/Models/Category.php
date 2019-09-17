<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'alias', 'name_ru', 'name_ua', 'image_thumb', 'image_full', 'desc'
    ];

    /* relations */
    public function subcategories(){
        return $this->hasMany('App\Models\Subcategory', 'category_id', 'id');
    }

    public function gproducts(){
        return $this->hasMany('App\Models\Gproduct', 'category_id', 'id');
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
