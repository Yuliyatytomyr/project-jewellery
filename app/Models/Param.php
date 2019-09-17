<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Param extends Model
{
    protected $fillable = [
        'type_param', 'special', 'type_value', 'name_ru', 'name_ua', 'desc'
    ];

    /* relations */
    public function subcategories()
    {
        return $this->belongsToMany('App\Models\Subcategory', 'subcategories_params', 'param_id', 'subcategory_id' );
    }

    public function pvalues(){
        return $this->hasMany('App\Models\Pvalue', 'param_id', 'id');
    }

    public function gpparams(){
        return $this->hasMany('App\Models\Gpparam', 'param_id', 'id');
    }

    /* get translate cols for localization*/
    public function getNameTran(){
        $qwery = 'name_'.app()->getLocale();
        return $this->$qwery;
    }

    /* get bool if pram has relation with subcategory*/
    public function boolHasSubcat($id){

        $flag = false;

        foreach($this->subcategories as $s){
            if($s->id == $id){
                $flag = true;
            }
        }

        return $flag;
    }

    /* methods get selected for select teg (type_param)*/
    public function getSelectTypeParam($type){
        if($this->type_param == $type){
            return 'selected';
        }else{
            return '';
        }
    }


    /* methods get selected for select teg (type_param)*/
    public function getSelectTypeValue($type){
        if($this->type_value == $type){
            return 'selected';
        }else{
            return '';
        }
    }

    /* method check spatcial param */
    public function checkSpecialParam(){
        if($this->special){
            return 'checked';
        }else{
            return '';
        }
    }
}
