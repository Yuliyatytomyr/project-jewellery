<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Btpost extends Model
{
    protected $fillable = [
        'btheme_id', 'alias', 'title_ru', 'title_ua', 's_desc_ru', 's_desc_ua', 'image_path', 'content_ru', 'content_ua', 'show_on'
    ];

    /* relations */
    public function btheme()
    {
        return $this->belongsTo('\App\Models\Btheme');
    }

    /* get translate cols for localization*/
    public function getTitleTran(){
        $qwery = 'title_'.app()->getLocale();
        return $this->$qwery;
    }

    public function getSDescTran(){
        $qwery = 's_desc_'.app()->getLocale();
        return $this->$qwery;
    }

    public function getContentTran(){
        $qwery = 'content_'.app()->getLocale();
        return $this->$qwery;
    }
}
