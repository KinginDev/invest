<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(
    [
        'middleware' => [ 'laravelForceHttps' ]
    ],
    function()
    {
    Route::get('/', function(){
        return view('Home.new-homepage');
    })->name('home');
     Route::get('/legal-information', function(){
        return view('Home.legal');
    })->name('legal');
    Route::get('/farms', function(){
        return view('farms');
    });
     Route::get('/faq', function(){
        return view('Home.faq');
    })->name('faq');
    Route::get('/contact', function(){
        return view('Home.contact');
    })->name('contact');
     Route::get('/privacy-policy', function(){
        return view('Home.privacy');
    });
 Route::get('/events', function(){
        return view('Home.event');
    })->name('events');


    Auth::routes();
 
    Route::prefix('dashboard')->middleware('IsActivated')->group(function(){
        Route::get('/', 'FrontendController@index')->name('user.dashboard');
    });
    //email verificaition
    Route::get('not/verified/{token}', function(){
        return view('Frontend.pages.notverified');
    })->middleware('auth:web')->name('not.verified');
    Route::get('not/revierify', function(){
        return view('Frontend.pages.verifinotifi');
    })->middleware('auth:web')->name('reverified');
    Route::post('resend/email/verification/{id}', 'HomeController@resend_email')->name('resend.email');
    //subdomain
    //    Route::group(['domain' => 'application.cryptogrime.com'], function(){
    //     Route::get('/form', function(){
    //        return view('form');
    //     });
    // });
     //   Route::domain('applications.cryptogrime.app')->group(function () {
     //    Route::get('/', function () {
     //          return view('form');
     //    });
     // });
   
    Route::get('auth/logout', 'Auth\LoginController@logout')->name('user.logout');
    
           Route::prefix('admin')->group(function(){
                Route::get('/', 'AdminController@index')->name('admin.dashboard');
                Route::get('/edit/{id}', 'AdminController@edit')->name('admin.edit');
                Route::put('/update/{id}', 'AdminController@update')->name('admin.update');
                Route::get('/destroy/{id}', 'AdminController@destroy')->name('admin.delete');
                Route::post('/user/edit/amount/{id}', 'AdminController@edit_amount')->name('edit.amount');
                Route::get('user/info/{id}', 'AdminController@get_user_info')->name('user.info');

                Route::get('/withdraw/i/email/{id}', 'AdminController@sendEmails')->name('admin.send.incorrect.email');
                //Login Routes
                Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login.form');
                Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
                //Register Routes
                Route::get('/register', 'Auth\AdminLoginController@showRegisterForm')->name('admin.register.form');
                Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
                
                //Transaction
                Route::resource('/transactions', 'Admin\TransactionController');
                Route::post('transactions/{id}/update',  'Admin\TransactionController@update')->name('transaction.update');
                Route::get('transactions/{id}/remove',  'Admin\TransactionController@destroy')->name('transaction.destroy');
              
                //Withdraw
                Route::resource('/withdraw', 'Admin\WithdrawController');
                Route::get('withdraw/{id}/remove', 'Admin\WithdrawController@destroy')->name('withdraw.delete');
                //search
                Route::get('search/', 'AdminController@search')->name('search.index');
                //Cards
                 Route::resource('/cards', 'Admin\CardController');
        });       Route::get('cards/{id}/remove', 'Admin\CardController@destroy')->name('cards.delete');
    });
    
    



