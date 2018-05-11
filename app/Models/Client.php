<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Client extends Model
{

    public $timestamps = false;

    protected $table = 'clients';

    protected $guarded = ['id'];

    public function registrate($email,$password)
    {

        DB::transaction(function () use ($email,$password){

            $user = new User;

            $user_id = $user->baseRegistration($email,$password);

            $this->user_id = $user_id;
            $this->entity = "physical";

            $this->save();

            $wallet = (new Wallet())->make($user_id);

        });

    }



}
