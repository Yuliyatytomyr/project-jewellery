<?php

namespace App\Http\Controllers\Administration\Admin\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
// models
use App\Models\Btheme;
use App\Models\Btpost;
// static functions
use App\Models\StaticFunctions\SF;

class PostController extends Controller
{

    public function show(Request $request, $locale, $alias){
        $btpost = Btpost::where('alias', $alias)->first();

        return view('administration.admin.blog.post.show.show', compact('btpost'));
    }


    public function index(Request $request, $locale){
        if($request->ajax()){
            if(isset($request->action) && isset($request->btpost_id)){
                $btpost = Btpost::find($request->btpost_id);
                if(!$btpost){
                    return response()->json([
                        'status' => 'error',
                        'msg' => 'Такой новости нет в базе данных!'
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
                $action_response = self::$action_name($btpost);

                if($action_response['status']){
                    return response()->json([
                        'status' => 'success',
                        'msg' => $action_response['msg'],
                        'btPostId' => $btpost->id,
                        'renders' => [
                            'toggle' => view('administration.admin.blog.theme.show.layouts.b_t_post_toggle', compact('btpost'))->render(),
                            'actions' => view('administration.admin.blog.theme.show.layouts.b_t_post_actions', compact('btpost'))->render()
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

    // ajax actions
    private function publicAjaxAction($btpost){
        $btpost->show_on = 1;
        $btpost->save();

        return [
            'status' => true,
            'msg' => '"'.$btpost->getTitleTran().'", данная новость опубликована!'
        ];
    }
    private function unpublicAjaxAction($btpost){
        $btpost->show_on = 0;
        $btpost->save();

        return [
            'status' => true,
            'msg' => '"'.$btpost->getTitleTran().'", данная новость выведена из публикации!'
        ];
    }

    public function create(Request $request, $locale){
        // settings
        $array_titles = ['ru' => 'Создать новость', 'ua' => 'Створити новину'];
        $themes = Btheme::all();

        if(count($themes) == 0) abort('404');

        return view('administration.admin.blog.post.create.create', compact('themes'))->withTitle($array_titles[app()->getLocale()]);
    }

    public function store(Request $request, $locale){

        $validator = Validator::make($request->all(), [
            'title_ru' => ['required', 'string', 'max:100'],
            'title_ua' => ['required', 'string', 'max:100'],
            's_desc_ru' => ['required', 'string', 'max:200'],
            's_desc_ua' => ['required', 'string', 'max:200'],
            'content_ru' => ['required', 'string'],
            'content_ua' => ['required', 'string'],
            'image_thumb' => [
                'required',
                'mimes:jpg,jpeg,png,gif'
            ],

        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        $btpost_alias = SF::str2url($request->title_ru);
        $data = ['title_ru' => $btpost_alias];

        $validator = Validator::make($data, [
            'title_ru' => ['required', 'string', 'max:100', 'unique:btposts,alias'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        if(Input::hasFile('image_thumb')){
            $img_path = self::uploadImage(Input::file('image_thumb'));
            $blog_card_image_path = $img_path;
        }


        $new_btpost = Btpost::create([
            'btheme_id' => $request->btheme_id,
            'alias' => $btpost_alias,
            'title_ru' => $request->title_ru,
            'title_ua' => $request->title_ua,
            's_desc_ru' => $request->s_desc_ru,
            's_desc_ua' => $request->s_desc_ua,
            'image_path' => (isset($blog_card_image_path)) ? $blog_card_image_path : null,
            'content_ru' => $request->content_ru,
            'content_ua' => $request->content_ua,
            'show_on' => (isset($request->show_on)) ? 1 : 0
        ]);

        return response()->json([
            'status' => 'success',
            'msg' => 'Новость успешно создана',
            'redirect' => $request->redirect,
            'subcategory' => $new_btpost
        ]);


    }

    private function uploadImage($photo){
        $zipping = 100;

        $name = sha1(date('YmdHis') . str_random(30));
        $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
        \Image::make($photo)->save('images/uploads/blog/posts_card_images/' . $resize_name, $zipping);

        return '/images/uploads/blog/posts_card_images/'.$resize_name;
    }

    public function edit(Request $request, $locale, $id){

        $btpost = Btpost::find($id);
        if(!$btpost) abort('404');

        //settings
        $array_titles = ['ru' => 'Редактирование новости: ', 'ua' => 'Редагування новини: '];
        $btpost->load('btheme');
        $themes = Btheme::all();

        return view('administration.admin.blog.post.edit.edit', compact('btpost', 'themes'))->withTitle($array_titles[app()->getLocale()].$btpost->getTitleTran());
    }

    public function update(Request $request, $locale, $id){

        $btpost = Btpost::find($id);

        if(!$btpost){
            return response()->json([
                'status' => 'error',
                'msg' => 'Такой новости нет в базе данных!'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'title_ru' => ['required', 'string', 'max:100'],
            'title_ua' => ['required', 'string', 'max:100'],
            's_desc_ru' => ['required', 'string', 'max:200'],
            's_desc_ua' => ['required', 'string', 'max:200'],
            'content_ru' => ['required', 'string'],
            'content_ua' => ['required', 'string'],
            'image_thumb' => [
                'mimes:jpg,jpeg,png,gif'
            ],

        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        $btpost_alias = SF::str2url($request->title_ru);
        $data = ['title_ru' => $btpost_alias];

        $validator = Validator::make($data, [
            'title_ru' => ['required', 'string', 'max:100', 'unique:btposts,alias,'.$btpost->id],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        if(Input::hasFile('image_thumb')){
            if($btpost->image_path != ''){
                unlink(public_path($btpost->image_path));
            }
            $img_path = self::uploadImage(Input::file('image_thumb'));
            $btpost->image_path = $img_path;
        }

        $btpost->btheme_id = $request->btheme_id;
        $btpost->alias = $btpost_alias;
        $btpost->title_ru = $request->title_ru;
        $btpost->title_ua = $request->title_ua;
        $btpost->s_desc_ru = $request->s_desc_ru;
        $btpost->s_desc_ua = $request->s_desc_ua;
        $btpost->content_ru = $request->content_ru;
        $btpost->content_ua = $request->content_ua;
        $btpost->show_on = (isset($request->show_on)) ? 1 : 0;
        $btpost->save();

        return response()->json([
            'status' => 'success',
            'msg' => 'Новость успешно изменена',
            'redirect' => asset(app()->getLocale().'/admin/blog/themes/'.$btpost->btheme->alias),
            'subcategory' => $btpost
        ]);
    }

    public function uploadContntImage(Request $request){

        $validator = Validator::make($request->all(), [
            'image' => [
                'mimes:jpg,jpeg,png,gif'
            ],

        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 'error',
                'msg' => 'Файл не изображение!'
            ], 200);
        }

        //settings
        $photo = Input::file('image');
        $zipping = 100;

        $name = sha1(date('YmdHis') . str_random(30));
        $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
        \Image::make($photo)->save('images/uploads/blog/posts_content_images/' . $resize_name, $zipping);

        $public_path =  asset('/images/uploads/blog/posts_content_images/'.$resize_name);

        return response()->json([
            'status' => 'success',
            'msg' => 'Изображение успешно загружено!',
            'image' =>  $public_path
        ]);

    }

    public function deleteContentImage(Request $request){
        $file_name = str_replace(url(''), '', $request->public_path);
        if(file_exists ( public_path($file_name))){
            unlink(public_path($file_name));
        }

        return response()->json([
            'status' => 'success',
            'msg' => 'Изображение успешно удалено!',
        ]);
    }

    public function updateContentEdit(Request $request){
        $btpost = Btpost::find($request->btpost_id);
        if($btpost){
            $btpost->content_ru = $request->content_ru;
            $btpost->content_ua = $request->content_ua;
            $btpost->save();
        }

        return response()->json([
            'status' => 'success',
            'msg' => 'Контент новости обновлен!',
        ]);
    }
}
