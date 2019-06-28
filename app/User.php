<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','email_token', 'activated','username','image','passthru'    ];
    protected $with= ['userData','transactions'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userData(){
        return $this->hasOne('App\UserData');
    }
    public function deposits(){
        return $this->hasMany('App\Deposit');
    }
   public function withdrawals(){
        return $this->hasMany('App\Withdrawal');
    }
    public function transactions(){
        return $this->hasMany('App\Transaction');
    }
     public function  cards(){
        return $this->hasMany('App\Card');
    }
}
