<?php

namespace App\Models\Settings\Content;

use Illuminate\Database\Eloquent\Model;

class ContentHomeSlider extends Model
{
    protected $fillable = [
        'alt', 'link', 'image_thumb', 'image_full', 'show_on'
    ];
}
