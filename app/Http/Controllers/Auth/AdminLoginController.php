<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
     use AuthenticatesUsers;
    //
    public function __construct() {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    public function showLoginForm(){
        return view('Admin.auth.login');
    }
    public function login(Request $request){
        //Validate the Form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //attempt to log user in
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::guard('admin')->attempt($credentials, $request->remember)){
            //redirect to intended location
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email', 'remeber'));

       // if unsuccessfull redirect back with form data 
    }

    public function logout(Request $request)
    {
        $this->guard('admin')->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
