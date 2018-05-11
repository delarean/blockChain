<?php

namespace App\Models;

use App\Classes\BlockChain;
use App\Classes\SelectRawSql;
use App\Exceptions\UserApiException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Wallet extends Model
{

    protected $table = 'wallets';

    protected $guarded = ['id'];

    protected $walletId;

    public function __construct($walletId = null,array $attributes = [])
    {
        $this->walletId = $walletId;
        parent::__construct($attributes);
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User','wallets_users');
    }

    /**
     * Создание нового кошелька
     * @param string $walletName
     * @param $user_id
     * @return $this
     */
    public function make($user_id,$walletName = null)
    {

        $blockch = new BlockChain;

        $wallet_info = $blockch->generateNewWallet();

        $this->text_address = $wallet_info['textAddress'];
        $this->hex_address = $wallet_info['hexAddress'];
        $this->private_key = $wallet_info['privateKey'];
        $this->public_key = $wallet_info['publicKey'];
        $this->name = $walletName;

        DB::transaction(function () use($user_id){
            $this->save();
            $this->makeBalance($this->id);
            $this->bindUser($user_id,$this->id);
        });

        return $this;

    }

    private function makeBalance($walletId)
    {

        DB::table('wallets_balance')->insert(
            ['wallet_id' => $walletId, 'balance' => 0]
        );

    }

    //Связывает пользователя и кошелёк
    public function bindUser($userId,$wallId)
    {

        DB::table('wallets_users')
            ->insert([
                'wallet_id' => $wallId,
                'user_id' => $userId
            ]);

    }

    public function activate()
    {

        $wallet = $this->where('text_address',$this->walletId)->first();

        $wallet->status = "ACTIVE";

        return $wallet->save();

    }

    public function getInfo()
    {
        return SelectRawSql::selectWalletInfo($this->walletId);
    }

    public function writeOff($amount)
    {

        if($amount <= 0)
            throw new UserApiException('less_or_equal_null');

        $wallet = $this->balanceAsTable();

        $newBalance = $wallet->balance - $amount;

        if($newBalance < 0)
            throw new UserApiException('not_enough_coins');

        DB::table('wallets_balance')
            ->where('id',$wallet->balance_id)
            ->update(['balance' => $newBalance]);

        return $newBalance;

    }

    public function writeOn($amount)
    {

        $wallet = $this->balanceAsTable();

        $newBalance = $wallet->balance + $amount;

        DB::table('wallets_balance')
            ->where('id',$wallet->balance_id)
            ->update(['balance' => $newBalance]);

        return $newBalance;

    }

    public function getBalance()
    {
        return $this->balanceAsTable()->balance;
    }

    public function balanceAsTable()
    {

        return DB::table($this->table)
            ->select($this->table.'.id','wallets_balance.balance',
                'wallets_balance.id as balance_id')
            ->where('text_address',$this->text_address)
            ->join('wallets_balance',$this->table.'.id','=','wallets_balance.wallet_id')
            ->limit(1)
            ->first();

    }

    public function search($partnerCode,$phone,$params)
    {

        return SelectRawSql::selectCards($partnerCode,$phone,$params);

    }

}
