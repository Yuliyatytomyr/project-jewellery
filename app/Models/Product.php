<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'barcode','gproduct_id','size','weight','g_price','sale','total_sum','status'
    ];

    public function gproduct()
    {
        return $this->belongsTo('\App\Models\Gproduct');
    }
}
