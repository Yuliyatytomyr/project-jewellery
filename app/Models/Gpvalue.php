<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gpvalue extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'gproduct_id', 'gpparam_id', 'pvalue_id'
    ];

    /* relations */
    public function gproduct()
    {
        return $this->belongsTo('\App\Models\Gproduct');
    }

    public function gpparam()
    {
        return $this->belongsTo('\App\Models\Gpparam');
    }

    public function pvalue()
    {
        return $this->belongsTo('\App\Models\Pvalue');
    }
}
