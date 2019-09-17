<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

// models
use App\Models\FavoritesProduct;

class RegisterController extends Controller
{


    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function redirectTo()
    {
        return app()->getLocale() . '/';
    }

    public function showRegistrationForm()
    {
        $data['title'] = '404';
        $data['name'] = 'Page not found';
        return response()
            ->view('errors.404',$data,404);
    }


    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        $user = $this->create($request->all());

        $this->guard()->login($user);

        // перенос избранных товаров из сессии в базу данных
        if(session('products.favorites')){
            $user_id = $user->id;
            foreach(session('products.favorites') as $item){
                FavoritesProduct::firstOrCreate([
                    'user_id' => $user_id,
                    'gproduct_id' => $item
                ]);
            }
            $request->session()->forget('products.favorites');
        }

        return response()->json([
                'status' => 'success',
                'user' => $user,
                'redirect' => $request->redirect,
            ]);

    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


}
