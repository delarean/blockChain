<?php

namespace App\Models;

use App\Classes\SelectRawSql;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $table = 'transactions';

    protected $guarded = ['id'];

    /**
     * Получить транзакции кошелька
     * @param $walletId
     * @param null $limit
     * @return array
     */
    public function get($walletId,$limit = null)
    {

     $trans = SelectRawSql::selectTransactions($walletId,$limit);

     return [
         'count' => count($trans),
         'transactions' => $trans,
         'countAll' => $this->count($walletId),
     ];
    }

    /**
     * Получить количество транзакций кошелька
     * @param $walletId
     * @return mixed
     */
    public function count($walletId)
    {

        return $this->where('sender_wallet_id',$walletId)
            ->orWhere('recipient_wallet_id',$walletId)
            ->count();

    }

}
