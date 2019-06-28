<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Card;
use App\Withdrawal;
use Session;
use Mail;
use App\Mail\SendsTransactionDeclined;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct() {
         $this->middleware('auth:admin');
     }

    public function index()
    {
        $users = User::latest()->paginate(50);
       
         return view('Admin.user.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('Admin.user.edit')->with(compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $user = User::find($id);
       $user->amount = $request->amount;

       $user->save();
       return redirect(route('admin.dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        // set flash data
        Session::flash('success', "The User was Successfully deleted");
        return back();
    }

    public function search() {
        $search = trim($_GET['search']);
        if(!empty($search)){
            $user = User::where('username', 'LIKE', '%' . $search . '%')->first();
             //dd($user);
            return view('Admin.search.index')->with(compact(['user']));
        }else{
            $error = 'The User was not found';
            return back()->with(compact($error));
        }
       
    }
    public function edit_amount(Request $request, $id){
        $user = User::find($id);
        $user->amount = $request->amount;
        $user->save();

    Session::flash('success', "The Amount was Successfully Changed");
        return back();

    }

    public function get_user_info($id){
        $user = User::find($id);

        return view('Admin.user.single')->with(compact('user'));
    }
    public function sendEmails( $id){
       // dd($id;
        $withdrawal = Withdrawal::with('user')->find($id);
        //dd($withdrawal);
       
        Mail::to($withdrawal->user->email)->send(new SendsTransactionDeclined($withdrawal));

        Session::flash('success', 'The Email has been Successfully sent to'. $withdrawal->user->email);
        return back();
    }
}
