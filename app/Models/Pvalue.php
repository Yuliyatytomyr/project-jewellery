<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pvalue extends Model
{
    protected $fillable = [
        'param_id', 'type_value', 'name_ru', 'name_ua', 'desc'
    ];

    /* relations */
    public function param()
    {
        return $this->belongsTo('\App\Models\Param');
    }

    public function gpvalues()
    {
        return $this->hasMany('App\Models\Gpvalue', 'pvalue_id', 'id');
    }

    /* get translate cols for localization*/
    public function getNameTran(){
        $qwery = 'name_'.app()->getLocale();
        return $this->$qwery;
    }
}
