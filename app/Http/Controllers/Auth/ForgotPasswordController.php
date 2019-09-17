<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    //use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }


    protected function credentials(Request $request)
    {
        return $request->only('email');
    }


    protected function sendResetLinkResponse(Request $request, $response)
    {
        return response()->json([
            'status' => 'success',
            'msg' => 'Письмо с изменением пароля отправлено на ваш эл. адресс!'
        ]);
    }


    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json([
            'status' => 'validation',
            'errors' => ['email' => trans($response)]
        ]);
    }


    public function broker()
    {
        return Password::broker();
    }
}
