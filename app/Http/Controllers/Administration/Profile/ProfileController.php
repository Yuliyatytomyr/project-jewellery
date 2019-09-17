<?php

namespace App\Http\Controllers\Administration\Profile;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function edit(Request $request){
        // setting
        $user = User::find(Auth::user()->id);
        $array_titles = ['ua'=>'Особистий кабінет','ru'=>'Личный кабинет'];
        $array_pages = ['user_card', 'change_pas', 'user_setting'];
        $page = (isset($request->page))?$request->page:'user_card';
        if(!in_array($page, $array_pages)){
            $page = 'user_card';
        }

        $render_content = view('administration.profile.layouts.'.$page, compact('user'))->render();

        if($request->ajax()){

            return json_encode([
                'status' => 'success',
                'render' => $render_content
            ]);

        }else{

            return view('administration.profile.profile', compact('user', 'render_content'))->withTitle( $array_titles[app()->getLocale()] );
        }


    }

    public function update(Request $request){


        $update_user = User::find(Auth::user()->id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:30',
            'surname' => 'required|string|max:40',
            'email' => 'required|string|email|max:160|unique:users,email,'.$update_user->id,
            'photo' => 'mimes:jpg,jpeg,png,gif',

        ]);

        if ($validator->fails()) {
            return json_encode([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        if(Input::hasFile('photo')){
            if($update_user->photo != null){
                unlink(public_path($update_user->photo));
            }
            $img_path = self::uploadImage(Input::file('photo'));
            $update_user->photo = $img_path;
        }

        $update_user->name = $request->name;
        $update_user->surname = $request->surname;
        $update_user->email = $request->email;
        $update_user->phone = $request->phone;
        $update_user->type = $request->type;
        $update_user->town = ($request->town == null || $request->town == '') ? null : $request->town;
        $update_user->birth_at = ($request->birth_at == null || $request->birth_at == '') ? null : $request->birth_at;
        $update_user->save();

        $user = User::find(Auth::user()->id);
        $render_content = view('administration.profile.layouts.user_card', compact('user'))->render();

        return json_encode([
            'status' => 'success',
            'render' => $render_content,
            'msg' => 'Данные успешно обновлены!'
        ]);
    }

    private function uploadImage($photo){
        $zipping = 90;

        $name = sha1(date('YmdHis') . str_random(30));
        $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
        \Image::make($photo)->save('images/uploads/profile_img/' . $resize_name, $zipping);

        return '/images/uploads/profile_img/'.$resize_name;
    }
}
