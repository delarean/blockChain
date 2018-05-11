<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{

    protected $table = 'partners';

    protected $guarded = ['id'];

    public function checkAuthToken($token,$partner_id)
    {
        return $this->where([['auth_token',$token],['partner_id',$partner_id]])->exists();
    }

    public function getCurrentPartner($authToken)
    {
        return $this->where('auth_token',$authToken)->first();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    

}
