<?php

namespace App\Http\Controllers\Administration\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
// models
use App\Models\Category;
// static functions
use App\Models\StaticFunctions\SF;

class CategoryController extends Controller
{
    public function index(Request $request){
        // settings
        $array_titles = ['ru'=>'Категории', 'ua'=>'Категорії'];

        $categories = Category::all();
        $categories->load('subcategories');


        return view('administration.admin.settings.categories.index.index', compact('categories'))->withTitle($array_titles[app()->getLocale()]);
    }

    public function create(Request $request){

        $user = \Auth::user();
        // $test = SF::str2url($str); транслиткрация функция

        return view('administration.admin.settings.categories.create.create', compact('user'))->withTitle('test');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name_ru' => ['required', 'string', 'max:50'],
            'name_ua' => ['required', 'string', 'max:50'],
            'image_thumb' => [
                'mimes:jpg,jpeg,png,gif',
                'max:1000',
                Rule::dimensions()->maxWidth(294)->maxHeight(508),
            ],
            'image_full' => [
                'mimes:jpg,jpeg,png,gif',
                'max:1000',
                Rule::dimensions()->maxWidth(1000)->maxHeight(508),
            ]
        ]);

        if ($validator->fails()) {

            dd($validator->getMessageBag()->toArray());
            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        $category_alias = SF::str2url($request->name_ru);


        if(Input::hasFile('image_thumb')){
            $img_path = self::uploadImage(Input::file('image_thumb'));
            $image_thumb_path = $img_path;
        }

        if(Input::hasFile('image_full')){
            $img_path = self::uploadImage(Input::file('image_full'));
            $image_full_path = $img_path;
        }

        $new_catergory = Category::create([
            'alias' => $category_alias,
            'name_ru' => $request->name_ru,
            'name_ua' => $request->name_ua,
            'image_thumb' => (isset($image_thumb_path)) ? $image_thumb_path : null,
            'image_full' => (isset($image_full_path)) ? $image_full_path : null,
            'desc_ru' => $request->desc_ru,
            'desc_ua' => $request->desc_ua,
        ]);

        dd($new_catergory);

        return response()->json([
            'status' => 'success',
            'msg' => 'Категория успешно создана',
            'category' => $new_catergory
        ]);

    }

    private function uploadImage($photo){
        $zipping = 100;

        $name = sha1(date('YmdHis') . str_random(30));
        $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
        \Image::make($photo)->save('images/uploads/categories_img/' . $resize_name, $zipping);

        return '/images/uploads/categories_img/'.$resize_name;
    }

    public function edit(Request $request, $locale, $alias){
        // settings
        $array_titles = ['ru'=>'Редактирование категории', 'ua'=>'Редагування категорії'];
        $category = Category::where('alias', $alias)->first();

        if(!$category){
            return redirect(app()->getLocale().'/admin/settings/categories');
        }

        return view('administration.admin.settings.categories.edit.edit', compact('category'))->withTitle($array_titles[app()->getLocale()]);
    }

    public function update(Request $request, $locale, $id){

        $category = Category::find($id);

        $validator = Validator::make($request->all(), [
            'name_ru' => ['required', 'string', 'max:50', 'unique:categories,name_ru,'.$category->id],
            'name_ua' => ['required', 'string', 'max:50'],
            'image_thumb' => [
                'mimes:jpg,jpeg,png,gif',
//                'max:1000',
//                Rule::dimensions()->maxWidth(294)->maxHeight(508),
            ],
            'image_full' => [
                'mimes:jpg,jpeg,png,gif',
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

        $category_alias = SF::str2url($request->name_ru);


        if(Input::hasFile('image_thumb')){
            if($category->image_thumb != null){
                unlink(public_path($category->image_thumb));
            }
            $img_path = self::uploadImage(Input::file('image_thumb'));
            $category->image_thumb = $img_path;
        }

        if(Input::hasFile('image_full')){
            if($category->image_full != null){
                unlink(public_path($category->image_full));
            }
            $img_path = self::uploadImage(Input::file('image_full'));
            $category->image_full = $img_path;
        }


        $category->alias = $category_alias;
        $category->name_ru = $request->name_ru;
        $category->name_ua = $request->name_ua;
        $category->desc_ru = $request->desc_ru;
        $category->desc_ua = $request->desc_ua;
        $category->save();

        return response()->json([
            'status' => 'success',
            'msg' => ($locale == 'ru') ? 'Категория успешно обновлена' : 'Категорія успішно оновлена',
            'redirect' => asset(app()->getLocale().'/admin/settings/categories'),
            'category' => $category
        ]);
    }

    public function show(Request $request, $locale, $alias){
        // settings
        $array_titles = ['ru'=>'Просмотр категории', 'ua'=>'Перегляд категорії'];

        $category = Category::where('alias', $alias)->first();
        if(!$category){
            return redirect(app()->getLocale().'/admin/settings/categories');
        }

        $category->load('subcategories');

        return view('administration.admin.settings.categories.show.show', compact('category'))->withTitle($array_titles[app()->getLocale()]);
    }
}
