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

    /**
     * User constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->info = $this->getCurrentUser();
    }

    /**
     * Базовая регистрация для любого типа пользователей
     * @param $email
     * @param $password
     * @return mixed
     */
    public function baseRegistration($email,$password)
    {

        $this->email = $email;
        $this->password = Hash::make($password);
        $this->type = "client";

        $this->save();

        return $this->id;

    }

    /**
     * Связь с моделью Partner
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function partner()
    {
        return $this->hasOne('App\Models\Partner');
    }

    /**
     * Залогинить пользователя
     * @param $user_id
     */
    public function login($user_id)
    {

        $user = $this->find($user_id)->toArray();

        session(['user' => $user]);

    }

    /**
     * Получить данные из сессии о текущем пользователе
     * @return bool|\Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed
     */
    public function getCurrentUser()
    {
        if(!$this->isLogin())
            return false;

        return session('user');

    }

    /**
     * Получить модель текущего пользователя
     * @return bool
     */
    public function getCurrentUserModel()
    {

        if(!$this->isLogin())
            return false;

        return $this->find(session('user')['id']);

    }

    /**
     * Проверка ,залогинен ли пользователь
     * @return bool
     */
    public function isLogin()
    {
        if(!session()->has('user'))
            return false;
        else
            return true;
    }

    /**
     * Проверка логина и пароля
     * @param $email
     * @param $password
     * @return bool
     */
    public function attemptLogin($email,$password)
    {

        $user = $this->where('email',$email)->first();

        if(is_null($user) || !Hash::check($password, $user->password))
           return false;

        $this->login($user->id);

        return true;

    }

    /**
     * Связь с моделью Wallet
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function wallets()
    {
        return $this->belongsToMany('App\Models\Wallet','wallets_users');
    }

    /**
     * Получение персонального кошелька пользователя
     * @return mixed
     */
    public function getPersonalWallet()
    {
        $user = $this->getCurrentUserModel();

        $wallet = $user->wallets()->first();

        $wallet->balance = $wallet->getBalance();

        return $wallet;

    }

    /**
     * Получение списка транзакций с участием пользователя
     * @return array
     */
    public function getTransactions()
    {

        $wallet = $this->getPersonalWallet();

        return (new Transaction)->get($wallet->id,25);

    }

}
