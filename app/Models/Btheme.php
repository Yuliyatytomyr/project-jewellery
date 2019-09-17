<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Btheme extends Model
{
    protected $fillable = [
        'alias', 'name_ru', 'name_ua', 'show_on'
    ];

    /* relations */
    public function btposts(){
        return $this->hasMany('App\Models\Btpost', 'btheme_id', 'id');
    }

    /* get translate cols for localization*/
    public function getNameTran(){
        $qwery = 'name_'.app()->getLocale();
        return $this->$qwery;
    }
}
