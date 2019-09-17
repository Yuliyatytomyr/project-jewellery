<?php

namespace App\Models\Settings\Content;

use Illuminate\Database\Eloquent\Model;

class ContentHomeMozaik extends Model
{
    protected $fillable = [
        'alt', 'link', 'name_ru', 'name_ua', 'image_thumb', 'image_full', 'show_on'
    ];

    /* get translate cols for localization*/
    public function getNameTran(){
        $qwery = 'name_'.app()->getLocale();
        return $this->$qwery;
    }
}
