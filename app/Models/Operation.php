<?php

namespace App\Models;

use App\Classes\SelectRawSql;
use App\Exceptions\ApiException;
use App\Exceptions\UserApiException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Operation extends Model
{

    protected $table = 'operations';

    protected $guarded = ['id'];

    public function __construct($operId = null,array $attributes = [])
    {
        parent::__construct($attributes);

        if(!is_null($operId))
            $this->id = $operId;
    }

    public function make($type = null,$partnerCode,$externalId = null,$pointsSpend = null,$pointsEarned = null)
    {

        if(!is_null($type))
            $this->operation_type_code = $type;

        if($pointsSpend !== null)
        $this->points_spend_amount = $pointsSpend;

        if($pointsEarned !== null)
            $this->points_earned_amount = $pointsEarned;

        $this->partner_code = $partnerCode;

        $this->externalId = $externalId;

        $this->save();

        return $this->id;

    }

    public function getList($partnerCode,$walletId = null,$cancelled = true,array $types_arr = [],$order = "DESC",$limit = 1000,$dateFrom,$dateTo)
    {

        $operations = SelectRawSql::selectOperationsList($partnerCode,$walletId,$cancelled,$types_arr,$order,$limit,$dateFrom,$dateTo);

        return $operations;
    }

    public function refund($partnerCode,$externalId,$refundAmount = null)
    {

        $operation = $this->where([
            ['id',$this->id],
            ['cancelled',0],
            ['partner_code',$partnerCode],
            ['externalId',$externalId]
        ])->first();

        if(is_null($operation))
            throw new UserApiException('operation_not_found');

        DB::transaction(function () use ($operation,$externalId,$refundAmount){

            $operation->cancelled = true;
            $operation->save();

            if(!is_null($refundAmount) && $refundAmount > 0){

                $wallet = new Wallet($externalId);

                $wallet->writeOn($refundAmount);

            }
            elseif($operation->points_earned_amount > 0){

                $wallet = new Wallet($externalId);

                $wallet->writeOn($operation->points_earned_amount);

            }
            elseif($operation->points_spend_amount > 0){

                $wallet = new Wallet($externalId);

                $wallet->writeOff($operation->points_spend_amount);

            }
        });

        return true;
    }

}
