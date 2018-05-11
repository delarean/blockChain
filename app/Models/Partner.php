<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{

    protected $table = 'partners';

    protected $guarded = ['id'];

    /**
     * Проверка токена партнёра
     * @param $token
     * @param $partner_id
     * @return mixed
     */
    public function checkAuthToken($token,$partner_id)
    {
        return $this->where([['auth_token',$token],['partner_id',$partner_id]])->exists();
    }

    /**
     * Текущий партнёр
     * @param $authToken
     * @return mixed
     */
    public function getCurrentPartner($authToken)
    {
        return $this->where('auth_token',$authToken)->first();
    }

    /**
     * Связь с моделью User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    

}
