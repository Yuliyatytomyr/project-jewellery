<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

// models
use App\User;
use App\Models\Gproduct;
use App\Models\FavoritesProduct;

class UserController extends Controller
{
    public function profile(Request $request){

        // settings
        $array_titles = ['ru'=>'Личный кабинет', 'ua'=>'Особистий кабінет'];
        $array_pages = ['profile', 'orders', 'actions', 'favorites'];
        $page = (isset($request->page_type))?$request->page_type:'profile';
        if(!in_array($page, $array_pages)){
            $page = 'profile';
        }

        $page_content = self::profilePageRenderTrait($request, $page);

        if($request->ajax()){

            return json_encode([
                'status' => 'success',
                'render' => $page_content
            ]);
        }else{

            //        $request->session()->flash('error_alert', 'Task was successful!'); // Флеш уведомление
            return view('user.profile.index.index', compact('page_content'))->withTitle($array_titles[app()->getLocale()]);
        }
    }

    private function profilePageRenderTrait(Request $request, $page){

        if($page == 'profile'){
            $user = User::find(Auth::user()->id);

            return view('user.profile.index.layouts.profile_content.'.$page, compact('user'))->render();
        }else if($page == 'favorites'){
            $gproducts_ids = Auth::user()->favorites_products->pluck('id');

            $gproducts = Gproduct::whereIn('id', $gproducts_ids)->paginate(1)->appends(['page_type' =>'favorites']);

            return view('user.profile.index.layouts.profile_content.'.$page, compact('gproducts'))->render();
        }
        return view('user.profile.index.layouts.profile_content.'.$page)->render();
    }

    public function profileUpdate(Request $request){

        if(isset($request->action)){
            $actions_array = ['profile', 'password'];
            if(in_array($request->action, $actions_array)){
                if($request->action == 'profile'){
                    return self::updateProfileTrait($request);
                }elseif($request->action == 'password'){
                    return self::updatePasswordUserTrait($request);
                }
            }
        }

        abort(404);
    }

    private function updateProfileTrait($request){

        $update_user = User::find(Auth::user()->id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:30',
            'surname' => 'required|string|max:40',
            'email' => 'required|string|email|max:160|unique:users,email,'.$update_user->id

        ]);

        if ($validator->fails()) {
            return json_encode([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $update_user->name = $request->name;
        $update_user->surname = $request->surname;
        $update_user->email = $request->email;
        $update_user->phone = $request->phone;
        $update_user->type = $request->type;
        $update_user->town = ($request->town == null || $request->town == '') ? null : $request->town;
        $update_user->birth_at = ($request->birth_at == null || $request->birth_at == '') ? null : $request->birth_at;
        $update_user->discount = $request->discount;
        $update_user->notify_phone = (isset($request->notify_phone))?'1':'0';
        $update_user->notify_email = (isset($request->notify_email))?'1':'0';
        $update_user->save();

        $user = User::find(Auth::user()->id);
        $render_content = view('user.profile.index.layouts.profile_content.profile_layouts.profile_user', compact('user'))->render();

        return json_encode([
            'status' => 'success',
            'render' => $render_content,
            'imgPath' => $user->photo,
            'msg' => 'Данные успешно обновлены!'
        ]);
    }

    private function updatePasswordUserTrait($request){

        $update_user = User::find(Auth::user()->id);

        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        $update_user->password = Hash::make($request->password);
        $update_user->save();

        return json_encode([
            'status' => 'success',
            'msg' => 'Данные успешно обновлены!'
        ]);
    }
}
