<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gpimage extends Model
{
    protected $fillable = [
        'gproduct_id', 'image_path'
    ];

    //relations
    public function gproduct()
    {
        return $this->belongsTo('\App\Models\Gproduct');
    }
}
