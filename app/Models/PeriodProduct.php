<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeriodProduct extends Model
{
    //
    protected $fillable = [
        'sku','sku_option','name','razmer','ves','price','discount','special_price',
        'description', 'description_ua', 'brand_new', 'weight', 'probe', 'amountKamny', 
        'weightKamny', 'formOgranky', 'GrColor'
    ];
}
