<?php

namespace App\Http\Controllers\Administration\Admin\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
// models
use App\Models\Btheme;
use App\Models\Btpost;
// static functions
use App\Models\StaticFunctions\SF;

class ThemeController extends Controller
{

    public function index(Request $request, $locale){
        if($request->ajax()){
            if(isset($request->action) && isset($request->theme_id)){
                $btheme = Btheme::find($request->theme_id);
                if(!$btheme){
                    return response()->json([
                        'status' => 'error',
                        'msg' => 'Такой темы новостей нет в базе данных!'
                    ], 200);
                }

                $array_actions = ['public', 'unpublic'];
                if(!in_array($request->action, $array_actions)){
                    return response()->json([
                        'status' => 'error',
                        'msg' => 'Недопустимая команда!'
                    ], 200);
                }

                $action_name = $request->action.'AjaxAction';
                $action_response = self::$action_name($btheme);

                if($action_response['status']){
                    return response()->json([
                        'status' => 'success',
                        'msg' => $action_response['msg'],
                        'themeId' => $btheme->id,
                        'renders' => [
                            'toggle' => view('administration.admin.blog.layouts.b_t_t_toggle', compact('btheme'))->render(),
                            'actions' => view('administration.admin.blog.layouts.b_t_t_actions', compact('btheme'))->render()
                        ]
                    ], 200);
                }else{
                    return response()->json([
                        'status' => 'error',
                        'msg' => 'Не удалось выполнить команду, свяжитесь с разработчиком сайта!'
                    ], 200);
                }

            }
        }

        abort('404');
    }

    private function publicAjaxAction($btheme){
        $btheme->show_on = 1;
        $btheme->save();

        return [
            'status' => true,
            'msg' => '"'.$btheme->getNameTran().'", данная тема опубликована!'
        ];
    }

    private function unpublicAjaxAction($btheme){
        $btheme->show_on = 0;
        $btheme->save();

        return [
            'status' => true,
            'msg' => '"'.$btheme->getNameTran().'", данная тема выведена из публикации!'
        ];
    }

    public function create(Request $request, $locale){
        // settings
        $array_titles = ['ru' => 'Создание темы новостей', 'ua' => 'Створення теми новин'];

        return view('administration.admin.blog.theme.create.create')->withTitle($array_titles[app()->getLocale()]);
    }

    public function store(Request $request, $locale){
        $validator = Validator::make($request->all(), [
            'name_ru' => ['required', 'string', 'max:250'],
            'name_ua' => ['required', 'string', 'max:250']
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }


        $theme_alias = SF::str2url($request->name_ru);

        $data = ['name_ru' => $theme_alias];

        $validator = Validator::make($data, [
            'name_ru' => ['required', 'string', 'max:250', 'unique:bthemes,alias'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        $new_btheme =Btheme::create([
            'alias' => $theme_alias,
            'name_ru' => $request->name_ru,
            'name_ua' => $request->name_ua,
            'show_on' => (isset($request->show_on)) ? 1 : 0
        ]);

        return response()->json([
            'status' => 'success',
            'msg' => 'Тема успешно создана',
            'redirect' => $request->redirect,
            'btheme' => $new_btheme
        ]);
    }

    public function edit(Request $request, $locale, $id){
        $btheme = Btheme::find($id);
        if(!$btheme) abort('404');

        //settings
        $array_titles = ['ru' => 'Редактирование темы новостей', 'ua' => 'Редагування теми новин'];

        return view('administration.admin.blog.theme.edit.edit', compact('btheme'))->withTitle($array_titles[app()->getLocale()]);
    }

    public function update(Request $request, $locale, $id){

        $btheme = Btheme::find($id);

        if(!$btheme){
            return response()->json([
                'status' => 'error',
                'msg' => 'Такой темы новостей нет в базе данных!'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name_ru' => ['required', 'string', 'max:250'],
            'name_ua' => ['required', 'string', 'max:250']
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        $theme_alias = SF::str2url($request->name_ru);
        $data = ['name_ru' => $theme_alias];

        $validator = Validator::make($data, [
            'name_ru' => ['required', 'string', 'max:250', 'unique:bthemes,alias,'.$btheme->id],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }


        $btheme->alias = $theme_alias;
        $btheme->name_ru = $request->name_ru;
        $btheme->name_ua = $request->name_ua;
        $btheme->show_on = (isset($request->show_on)) ? 1 : 0;
        $btheme->save();

        return response()->json([
            'status' => 'success',
            'msg' => 'Тема успешно изменена',
            'redirect' => $request->redirect,
            'btheme' => $btheme
        ]);
    }

    public function show(Request $request, $locale, $alias){
        $btheme = Btheme::where('alias', $alias)->first();
        if(!$btheme) abort('404');
        $bt_posts = Btpost::select(['id','btheme_id', 'alias', 'title_ru','title_ua','image_path','show_on','created_at','updated_at'])
            ->where('btheme_id', $btheme->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // settings
        $array_titles = ['ru' => 'Список новостей по тематике: "', 'ua' => 'Список новин з тематикою: "'];

        return view('administration.admin.blog.theme.show.show', compact('btheme', 'bt_posts'))->withTitle($array_titles[app()->getLocale()].$btheme->getNameTran().'""');
    }
}
