<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

use App\Mail\SendsVerificationEmail;
use Mail;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
      /**
     * Generate random string to for users email token
     */
    public function generateRandomString($length = 70){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
   
     protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'activated' => 0,
            'passthru' => $data['password'],
            'email_token' => $this->generateRandomString(),
            'amount' => 100
        ]);
    }
       /**
      * Handle a registration request for the application.
      *
      * @param \Illuminate\Http\Request $request
      * @return \Illuminate\Http\Response
      */
      public function register(Request $request)
      {
       
      $this->validator($request->all())->validate();
      event(new Registered($user = $this->create($request->all())));
         Mail::to($user->email)->send(new SendsVerificationEmail($user));
          //Add Attempt to login user
          $credentials =
             ['email'=> $request->email,
             'password' => $request->password,
            ];
            $remember = $request->remember;
          Auth::guard('web')->attempt($credentials,$remember);
      return view('Frontend.pages.verifinotifi');
    }
    public function showRegistrationForm() {
        return view('Frontend.auth.register');
    }
    /**
      * Handle a registration request for the application.
      *
      * @param $token
      * @return \Illuminate\Http\Response
      */
      public function verify($token)
      {
      $user = User::where('email_token',$token)->first();
     // dd($user);
      $user->activated = 1;
      $user->save();
      $justactivated = true;
      if($user->save()){
        return redirect(route('user.dashboard'));
      }
    }
  
}
