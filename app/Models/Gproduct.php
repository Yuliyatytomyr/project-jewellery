<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gproduct extends Model
{
    protected $fillable = [
        'alias','item_code','category_id','subcategory_id','name_ru','name_ua','desc_ru','desc_ua','new_on','topsale_on','sprice_on'
    ];

    /* relations */
    public function category()
    {
        return $this->belongsTo('\App\Models\Category');
    }

    public function subcategory()
    {
        return $this->belongsTo('\App\Models\Subcategory');
    }

    public function gpparams()
    {
        return $this->hasMany('App\Models\Gpparam', 'gproduct_id', 'id');
    }

    public function gpvalues(){
        return $this->hasMany('App\Models\Gpvalue', 'gproduct_id', 'id');
    }

    public function gpimages()
    {
        return $this->hasMany('App\Models\Gpimage', 'gproduct_id', 'id');
    }
    // group relations for products
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'gproduct_id', 'id');
    }

    public function productsNew()
    {
        return $this->hasMany('App\Models\Product', 'gproduct_id', 'id')->where('status', 'new')->orderBy('total_sum', 'desc');
    }

    public function productsReserve()
    {
        return $this->hasMany('App\Models\Product', 'gproduct_id', 'id')->where('status', 'reserve');
    }

    public function productsSold()
    {
        return $this->hasMany('App\Models\Product', 'gproduct_id', 'id')->where('status', 'sold');
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
