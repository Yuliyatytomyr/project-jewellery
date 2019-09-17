<?php

namespace App\Http\Controllers\Administration\Admin\Settings\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
// models
use App\Models\Settings\Content\ContentHomeMozaik;

class HomeMozaikController extends Controller
{
    public  function show(Request $request, $locale, $id){
        abort('404');
    }

    public function create(Request $request, $locale){
        // settings
        $array_titles = ['ru' => 'Создать элемент мозайки', 'ua' => 'Створити елемент мозайки'];
       return view('administration.admin.settings.content.home.mozaiks.create.create')->withTitle($array_titles[app()->getLocale()]);
    }

    public function store(Request $request, $locale){
        $validator = Validator::make($request->all(), self::ruleValidationCreate(isset($request->show_on)));

        if ($validator->fails()) {

            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        if(Input::hasFile('image_thumb')){
            $img_path = self::uploadImage(Input::file('image_thumb'));
            $image_thumb_path = $img_path;
        }

        if(Input::hasFile('image_full') && isset($request->show_on)){
            $img_path = self::uploadImage(Input::file('image_full'));
            $image_full_path = $img_path;
        }

        $new_mozaik = ContentHomeMozaik::create([
            'alt' => $request->alt,
            'link' => $request->link,
            'name_ru' => $request->name_ru,
            'name_ua' => $request->name_ua,
            'image_thumb' => $image_thumb_path,
            'image_full' => (isset($request->show_on)) ? $image_full_path : null,
            'show_on' => (isset($request->show_on)) ? 1 : 0,
        ]);

        return response()->json([
            'status' => 'success',
            'msg' => 'Мозайка успешно создан!',
            'redirect' => $request->redirect,
            'mozaik' => $new_mozaik
        ]);
    }

    private function ruleValidationCreate($flag){

        $rule = [
            'alt' => ['required', 'string', 'max:200'],
            'name_ru' => ['required', 'string', 'max:50'],
            'name_ua' => ['required', 'string', 'max:50'],
            'link' => ['required', 'url'],
            'image_thumb' => [
                'required',
                'mimes:jpg,jpeg,png',
//                'max:1000',
//                Rule::dimensions()->maxWidth(294)->maxHeight(508),
            ]
        ];

        if($flag){
            $rule['image_full'] = [
                'required',
                'mimes:jpg,jpeg,png',
//                'max:1000',
//                Rule::dimensions()->maxWidth(1000)->maxHeight(508),
            ];

        }

        return $rule;
    }

    private function uploadImage($photo){
        $zipping = 100;

        $name = sha1(date('YmdHis') . str_random(30));
        $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
        \Image::make($photo)->save('images/uploads/content/home_mozaik/' . $resize_name, $zipping);

        return '/images/uploads/content/home_mozaik/'.$resize_name;
    }

    public function edit(Request $request, $locale, $id){
        // settings
        $array_titles = ['ru' => 'Редактировать: ', 'ua' => 'Редагувати: '];

        $mozaik = ContentHomeMozaik::find($id);
        if(!$mozaik) abort('404');

        return view('administration.admin.settings.content.home.mozaiks.edit.edit', compact('mozaik'))->withTitle($array_titles[app()->getLocale()].$mozaik->alt);
    }

    public function update(Request $request, $locale, $id){
        $mozaik =  ContentHomeMozaik::find($id);
        if(!$mozaik){
            return response()->json([
                'status' => 'error',
                'msg' => 'Такого элемента мозаики нет в базе данных!'
            ], 200);
        }

        $validator = Validator::make($request->all(), self::ruleValidationEdit(($mozaik->show_on == 1)));

        if ($validator->fails()) {

            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        if(Input::hasFile('image_thumb')){
            if($mozaik->image_thumb != ''){
                unlink(public_path($mozaik->image_thumb));
            }
            $img_path = self::uploadImage(Input::file('image_thumb'));
            $mozaik->image_thumb = $img_path;
        }

        if(Input::hasFile('image_full') && isset($request->show_on)){
            if($mozaik->image_full != ''){
                unlink(public_path($mozaik->image_full));
            }
            $img_path = self::uploadImage(Input::file('image_full'));
            $mozaik->image_full = $img_path;
        }

        $mozaik->alt = $request->alt;
        $mozaik->link = $request->link;
        $mozaik->name_ru = $request->name_ru;
        $mozaik->name_ua = $request->name_ua;
        $mozaik->save();

        return response()->json([
            'status' => 'success',
            'msg' => 'Элемент мозайки успешно изменен!',
            'redirect' => $request->redirect,
            'mozaik' => $mozaik
        ]);
    }

    private function ruleValidationEdit($flag){

        $rule = [
            'alt' => ['required', 'string', 'max:200'],
            'name_ru' => ['required', 'string', 'max:50'],
            'name_ua' => ['required', 'string', 'max:50'],
            'link' => ['required', 'url'],
            'image_thumb' => [
                'mimes:jpg,jpeg,png',
//                'max:1000',
//                Rule::dimensions()->maxWidth(294)->maxHeight(508),
            ]
        ];

        if($flag){
            $rule['image_full'] = [
                'mimes:jpg,jpeg,png',
//                'max:1000',
//                Rule::dimensions()->maxWidth(1000)->maxHeight(508),
            ];

        }

        return $rule;
    }
}
