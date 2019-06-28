<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Mail;
use App\Mail\SendsVerificationEmail;
use Session;
class HomeController extends Controller
{
      public function resend_email($id){
        //dd($user);
        $user = User::find($id);
        Mail::to($user->email)->send(new SendsVerificationEmail($user));
        $alert = true;
        Session::flash('alert', true);
        return redirect(route('reverified'))->with(compact(['alert']));
    }

}
