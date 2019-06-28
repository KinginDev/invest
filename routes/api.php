<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/user/dashboard/amount/{id}', 'Api\FrontendController@get_wallet_amount');
Route::get('/user/activate/get/email/{id}', 'Api\FrontendController@get_activate_email');
//Activate users
Route::post('/activate/users/{id}', 'Api\FrontendController@verify_user');
//User Image Upload
Route::post('/user/activate/upload/image/{id}','Api\FrontendController@upload_image');
//user profile
Route::get('/user/data/{id}', 'Api\FrontendController@get_profile_data');
//Deposits
Route::post('/user/deposit/{id}', 'Api\FrontendController@deposit_amount');
//Withdrawals
Route::post('/user/withdrawal/make/{id}', 'Api\FrontendController@post_withdrawal');
//transactions
Route::get('/user/dashboard/transactions/{id}', 'Api\FrontendController@dashboard_transactions');
Route::get('/user/dashboard/transactions/all/{id}', 'Api\FrontendController@dashboard_transactions_all');
Route::get('/user/dashboard/transactions/count/{id}', 'Api\FrontendController@dashboard_transactions_count');
