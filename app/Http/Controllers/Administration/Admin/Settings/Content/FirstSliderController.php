<?php

namespace App\Http\Controllers\Administration\Admin\Settings\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
// models
use App\Models\Settings\Content\ContentHomeSlider;

class FirstSliderController extends Controller
{

    public function show(Request $request, $locale, $id){
        if($request->ajax()){
            $slider = ContentHomeSlider::find($id);

            if(!$slider){
                return response()->json([
                    'status' => 'error',
                    'msg' => 'Такой слайдер не найден в базе данных!'
                ], 200);
            }

            if($request->action == 'off'){
                $slider->show_on = 0;
            }else{
                $slider->show_on = 1;
            }
            $slider->save();

            return response()->json([
                'status' => 'success',
                'msg' => ($request->action == 'off') ? 'Слайдер успешно отключен!' : 'Слайдер успешно подключен!',
                'sliderId' => $slider->id,
                'renders' => [
                    'toggle' => view('administration.admin.settings.content.home.index.layouts.p_f_s_toggle', compact('slider'))->render(),
                    'actions' => view('administration.admin.settings.content.home.index.layouts.p_f_s_actions', compact('slider'))->render()
                ]
            ], 200);
        }
            abort('404');
    }

    public function create(Request $request, $locale){
        // settings
        $array_titles = ['ru'=>'Создание слайда ниже главного меню', 'ua'=>'Створення слайду нижче головного меню'];

        return view('administration.admin.settings.content.home.first_slider.create.create')->withTitle($array_titles[app()->getLocale()]);
    }

    public function store(Request $request, $locale){

        $validator = Validator::make($request->all(), [
            'alt' => ['required', 'string', 'max:200'],
            'link' => ['required', 'url'],
            'image_thumb' => [
                'required',
                'mimes:jpg,jpeg,png',
//                'max:1000',
//                Rule::dimensions()->maxWidth(294)->maxHeight(508),
            ],
            'image_full' => [
                'required',
                'mimes:jpg,jpeg,png',
//                'max:1000',
//                Rule::dimensions()->maxWidth(1000)->maxHeight(508),
            ]
        ]);

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

        if(Input::hasFile('image_full')){
            $img_path = self::uploadImage(Input::file('image_full'));
            $image_full_path = $img_path;
        }

        $new_slider = ContentHomeSlider::create([
            'alt' => $request->alt,
            'link' => $request->link,
            'image_thumb' => $image_thumb_path,
            'image_full' => $image_full_path,
            'show_on' => (isset($request->show_on)) ? 1 : 0,
        ]);

        return response()->json([
            'status' => 'success',
            'msg' => 'Слайд успешно создан!',
            'redirect' => $request->redirect,
            'slider' => $new_slider
        ]);
    }
    private function uploadImage($photo){
        $zipping = 100;

        $name = sha1(date('YmdHis') . str_random(30));
        $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
        \Image::make($photo)->save('images/uploads/content/home_first_sliders/' . $resize_name, $zipping);

        return '/images/uploads/content/home_first_sliders/'.$resize_name;
    }

    public function edit(Request $request, $locale, $id){

        // settings
        $array_titles = ['ru'=>'Редактирование слайда: ', 'ua'=>'Редагування слайду: '];

        $slider = ContentHomeSlider::find($id);
        if(!$slider) abort('404');

        return view('administration.admin.settings.content.home.first_slider.edit.edit', compact('slider'))->withTitle($array_titles[app()->getLocale()].$slider->alt);
    }

    public function update(Request $request, $locale, $id){

        $slider = ContentHomeSlider::find($id);
        if(!$slider){
            return response()->json([
                'status' => 'error',
                'msg' => 'Такого слайдера нет в базе данных!'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'alt' => ['required', 'string', 'max:200'],
            'link' => ['required', 'url'],
            'image_thumb' => [
                'mimes:jpg,jpeg,png',
//                'max:1000',
//                Rule::dimensions()->maxWidth(294)->maxHeight(508),
            ],
            'image_full' => [
                'mimes:jpg,jpeg,png',
//                'max:1000',
//                Rule::dimensions()->maxWidth(1000)->maxHeight(508),
            ]
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        if(Input::hasFile('image_thumb')){
            if($slider->image_thumb != ''){
                unlink(public_path($slider->image_thumb));
            }
            $img_path = self::uploadImage(Input::file('image_thumb'));
            $slider->image_thumb = $img_path;
        }

        if(Input::hasFile('image_full')){
            if($slider->image_full != ''){
                unlink(public_path($slider->image_full));
            }
            $img_path = self::uploadImage(Input::file('image_full'));
            $slider->image_full = $img_path;
        }

        $slider->alt = $request->alt;
        $slider->link = $request->link;
        $slider->show_on = (isset($request->show_on)) ? 1 : 0;
        $slider->save();

        return response()->json([
            'status' => 'success',
            'msg' => 'Слайд успешно обновлен!',
            'redirect' => $request->redirect,
            'subcategory' => $slider
        ]);
    }
}
