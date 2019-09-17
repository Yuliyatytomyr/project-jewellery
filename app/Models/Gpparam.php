<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gpparam extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'param_id', 'gproduct_id'
    ];

    /* relations */
    public function gproduct()
    {
        return $this->belongsTo('\App\Models\Gproduct');
    }

    public function param()
    {
        return $this->belongsTo('\App\Models\Param');
    }

    public function gpvalues()
    {
        return $this->hasMany('App\Models\Gpvalue', 'gpparam_id', 'id');
    }
}
