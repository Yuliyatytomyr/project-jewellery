<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavoritesProduct extends Model
{
   public $timestamps = false;

    protected $fillable = [
        'gproduct_id', 'user_id'
    ];
}
