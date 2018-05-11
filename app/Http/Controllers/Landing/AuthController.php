<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRegisterRequest;
use App\Http\Requests\PartnerRegisterRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{

    public function registerUser(ClientRegisterRequest $request)
    {

        $email = $request->input('email');
        $password = $request->input('password');

        $client = new Client;

        $client->registrate($email,$password);

        (new User())->login($client->user_id);

        return redirect('lk/');

    }

    public function loginUser(UserLoginRequest $request)
    {

        $email = $request->input('log_email');

        $passwd = $request->input('log_password');

        if(!(new User)->attemptLogin($email,$passwd))
        return Redirect::back()->withErrors(['auth_failed' => 'Введённые данные неверны']);

        return redirect('lk/');

    }

}
