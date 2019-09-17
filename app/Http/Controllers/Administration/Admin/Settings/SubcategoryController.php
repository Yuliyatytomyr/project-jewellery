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
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Param;
// static functions
use App\Models\StaticFunctions\SF;

class SubcategoryController extends Controller
{
    public function index(Request $request, $locale){
        // settings
        $array_titles = ['ru'=>'Подкатегории', 'ua'=>'Підкатегорії'];

        $subcategories = Subcategory::orderBy('category_id')->paginate(10);
        $subcategories->load('category');

        return view('administration.admin.settings.subcategories.index.index', compact('subcategories'))->withTitle($array_titles[app()->getLocale()]);
    }

    public function create(Request $request, $locale){
        // settings
        $array_titles = ['ru'=>'Создать подкатегорию', 'ua'=>'Створити підкатегорію'];
        $categories = Category::all();

        return view('administration.admin.settings.subcategories.create.create', compact('categories'))->withTitle($array_titles[app()->getLocale()]);
    }

    public function store(Request $request, $locale){

        $validator = Validator::make($request->all(), [
            'name_ru' => ['required', 'string', 'max:50'],
            'name_ua' => ['required', 'string', 'max:50'],
            'image_thumb' => [
                'mimes:jpg,jpeg,png,gif'
            ],
            'image_full' => [
                'mimes:jpg,jpeg,png,gif'
            ]
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        $category = Category::find($request->category_id);
        $subcategory_alias = SF::str2url($request->name_ru);
        $subcategory_alias = $category->alias.'_'.$subcategory_alias;

        $data = ['name_ru' => $subcategory_alias];

        $validator = Validator::make($data, [
            'name_ru' => ['required', 'string', 'max:50', 'unique:subcategories,alias'],
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

        $new_subcatergory = Subcategory::create([
            'alias' => $subcategory_alias,
            'category_id' => $request->category_id,
            'name_ru' => $request->name_ru,
            'name_ua' => $request->name_ua,
            'image_thumb' => (isset($image_thumb_path)) ? $image_thumb_path : null,
            'image_full' => (isset($image_full_path)) ? $image_full_path : null,
            'desc_ru' => $request->desc_ru,
            'desc_ua' => $request->desc_ua,
        ]);

        return response()->json([
            'status' => 'success',
            'msg' => 'Категория успешно создана',
            'redirect' => $request->redirect,
            'subcategory' => $new_subcatergory
        ]);
    }

    public function edit(Request $request, $locale, $alias){
        // settings
        $array_titles = ['ru'=>'Редактировать подкатегорию', 'ua'=>'Редагувати підкатегорію'];
        $categories = Category::all();
        $subcategory = Subcategory::where('alias', $alias)->first();

        if(!$subcategory){
            return redirect(app()->getLocale().'/admin/settings/subcategories');
        }
        return view('administration.admin.settings.subcategories.edit.edit', compact('categories', 'subcategory'))->withTitle($array_titles[app()->getLocale()]);
    }

    public function update(Request $request, $locale, $alias){

        $subcategory = Subcategory::where('alias', $alias)->first();

        if(!$subcategory){
            return response()->json([
                'status' => 'error',
                'redirect' => asset(app()->getLocale().'/admin/settings/subcategories'),
                'msg' => 'Такой подкатегории в базе данных нет!'
            ], 200);
        }

        $validator = Validator::make($request->all(), [
            'name_ru' => ['required', 'string', 'max:50'],
            'name_ua' => ['required', 'string', 'max:50'],
            'image_thumb' => [
                'mimes:jpg,jpeg,png,gif'
            ],
            'image_full' => [
                'mimes:jpg,jpeg,png,gif'
            ]
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        $category = Category::find($request->category_id);
        $subcategory_alias = SF::str2url($request->name_ru);
        $subcategory_alias = $category->alias.'_'.$subcategory_alias;

        $data = ['name_ru' => $subcategory_alias];

        $validator = Validator::make($data, [
            'name_ru' => ['required', 'string', 'max:50', 'unique:subcategories,alias,'.$subcategory->id],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }


        if(Input::hasFile('image_thumb')){
            if($subcategory->image_thumb != null){
                unlink(public_path($subcategory->image_thumb));
            }
            $img_path = self::uploadImage(Input::file('image_thumb'));
            $subcategory->image_thumb = $img_path;
        }

        if(Input::hasFile('image_full')){
            if($subcategory->image_full != null){
                unlink(public_path($subcategory->image_full));
            }
            $img_path = self::uploadImage(Input::file('image_full'));
            $subcategory->image_full = $img_path;
        }


        $subcategory->alias = $subcategory_alias;
        $subcategory->category_id = $request->category_id;
        $subcategory->name_ru = $request->name_ru;
        $subcategory->name_ua = $request->name_ua;
        $subcategory->desc_ru = $request->desc_ru;
        $subcategory->desc_ua = $request->desc_ua;
        $subcategory->save();

        return response()->json([
            'status' => 'success',
            'msg' => 'Категория успешно обновлена',
            'redirect' => asset(app()->getLocale().'/admin/settings/subcategories'),
            'subcategory' => $subcategory
        ]);
    }

    public function show(Request $request, $locale, $alias){
        $subcategory = Subcategory::where('alias', $alias)->first();

        if(!$subcategory){
            return redirect(app()->getLocale().'/admin/settings/subcategories');
        }

        $params = Param::with('subcategories')->paginate(10);

        return view('administration.admin.settings.subcategories.show.show', compact('subcategory', 'params'))->withTitle($subcategory->getNameTran());
    }

    private function uploadImage($photo){
        $zipping = 100;

        $name = sha1(date('YmdHis') . str_random(30));
        $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
        \Image::make($photo)->save('images/uploads/subcategories_img/' . $resize_name, $zipping);

        return '/images/uploads/subcategories_img/'.$resize_name;
    }

    /* public method for subcategory's actions */
    // select trait for action
    public function actions(Request $request, $locale, $id, $action){
        // array exist traits for actions
        $actions_array = ['param_attach', 'param_detach'];

        if(!in_array($action, $actions_array)){
            return response()->json([
                'status' => 'error',
                'msg' => 'Метод отсутсвует!'
            ]);
        }

        $action_trait = 'trait'.str_replace(' ', '', ucwords(str_replace('_', ' ', $action)));

        return self::$action_trait($request, $id);
    }

    /* actions traits*/
    // create subcategory relation to param
    private function traitParamAttach($request, $id){
        $subcategory = Subcategory::find($id);

        $subcategory->params()->attach($request->param_id);
        $param = Param::find($request->param_id);

        return response()->json([
            'status' => 'success',
            'msg' => 'Параметр успешно подключен!',
            'render' => view('administration.admin.settings.subcategories.show.layouts.pram_ralation_change_block', compact('param','subcategory'))->render()
        ]);
    }

    // remove subcategory relation to param
    private function traitParamDetach($request, $id){

        $subcategory = Subcategory::find($id);

        $subcategory->params()->detach($request->param_id);
        $param = Param::find($request->param_id);

        self::removeParamFromGroupProducts($subcategory, $param);

        return response()->json([
            'status' => 'success',
            'msg' => 'Параметр успешно отключен!',
            'render' => view('administration.admin.settings.subcategories.show.layouts.pram_ralation_change_block', compact('param','subcategory'))->render()
        ]);
    }
    // remove params from gproducts
    private function removeParamFromGroupProducts($subcategory, $param){

    }
}


