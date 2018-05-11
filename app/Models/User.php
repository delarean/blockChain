<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $table = 'users';

    protected $guarded = ['id'];

    protected $hidden = ['password'];

    public $timestamps = false;

    public $info;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->info = $this->getCurrentUser();
    }

    public function baseRegistration($email,$password)
    {

        $this->email = $email;
        $this->password = Hash::make($password);
        $this->type = "client";

        $this->save();

        return $this->id;

    }

    public function partner()
    {
        return $this->hasOne('App\Partner');
    }

    public function login($user_id)
    {

        $user = $this->find($user_id)->toArray();

        session(['user' => $user]);

    }

    public function getCurrentUser()
    {
        if(!$this->isLogin())
            return false;

        return session('user');

    }

    public function getCurrentUserModel()
    {

        if(!$this->isLogin())
            return false;

        return $this->find(session('user')['id']);

    }

    public function isLogin()
    {
        if(!session()->has('user'))
            return false;
        else
            return true;
    }

    public function attemptLogin($email,$password)
    {

        $user = $this->where('email',$email)->first();

        if(is_null($user) || !Hash::check($password, $user->password))
           return false;

        $this->login($user->id);

        return true;

    }

    public function wallets()
    {
        return $this->belongsToMany('App\Models\Wallet','wallets_users');
    }

    public function getPersonalWallet()
    {
        $user = $this->getCurrentUserModel();

        $wallet = $user->wallets()->first();

        $wallet->balance = $wallet->getBalance();

        return $wallet;

    }

    public function getTransactions()
    {

        $wallet = $this->getPersonalWallet();

        return (new Transaction)->get($wallet->id,25);

    }

}
