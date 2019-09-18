<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MailingFromSite;

class MailingFromSiteController extends Controller
{
    //
    public function subscribe(Request $request){
        
        $user = MailingFromSite::updateOrCreate(['email' => request('email')], [ 
            'email' => request('email')
        ]);

        return response("Saved to DB", 200);
    }

    public function unsubscribe(Request $request){

        try {
            $user = MailingFromSite::where('email', '=', $request->input('email'))->firstOrFail();

            MailingFromSite::where('id', $user->id)->delete();
            
            return response('Deleted successfully', 200);
        } catch (\Throwable $th) {
            return response('User not found', 404);
        }

    }
}
