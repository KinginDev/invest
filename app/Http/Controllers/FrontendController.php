<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use App\Mail\SendsVerificationEmail;

class FrontendController extends Controller
{
	public function __construct(){
		return $this->middleware(['auth:web', 'IsActivated']);
	}
    public function index(){
    	return view('Frontend.pages.dashboard');
    }
  
}
