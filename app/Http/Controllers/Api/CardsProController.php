<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CalculateDiscountRequest;
use App\Http\Requests\CardActivateRequest;
use App\Http\Requests\CardIssueApiRequest;
use App\Http\Requests\CardPurchaseRequest;
use App\Http\Requests\CardSearchRequest;
use App\Http\Requests\CardsInfoRequest;
use App\Http\Requests\OperationInfoRequest;
use App\Http\Requests\RefundRequest;
use App\Http\Requests\WriteOffRequest;
use App\Models\Operation;
use App\Models\Partner;
use App\Models\Wallet;
use App\Http\Controllers\Controller;

class CardsProController extends Controller
{

    public function issueNewWallet(CardIssueApiRequest $request)
    {

        $authToken = $request->header('Authorization');
        $partnerCode = $request->input('partnerInfo.partnerCode');

        $wallet = new Wallet;

        $partner = new Partner;

        $partner = $partner->getCurrentPartner($authToken);

        $wallet = $wallet->make($partner->user_id);

        return response([
            'cardIdentifier' => [
                'externalId' => $wallet->text_address,
                'phone' => $partner->user->phone,
            ],
            'partnerCode' => $partnerCode,
            'operationId' => (new Operation())->make('ISSUE_CARD',$partnerCode,$wallet->text_address)
        ]);

    }

    public function activateCard(CardActivateRequest $request)
    {

        $walletId = $request->input('cardActivateRequest.cardIdentifier.externalId');
        $partnerCode = $request->input('partnerInfo.partnerCode');

        $wallet = new Wallet($walletId);

        $wallet->activate();

        return response([
            'partnerCode' => $partnerCode,
            'operationId' => (new Operation())->make('ACTIVATION',$partnerCode,$walletId)
        ]);

    }

    public function getCardInfo(CardsInfoRequest $request)
    {
        $partnerCode = $request->input('partnerInfo.partnerCode');

        $walletId = $request->input('cardIdentifier.externalId');

        $wallet  = new Wallet($walletId);

        $wallet_info = $wallet->getInfo();

        return response([
            'cardInfo' => [
                'cardName' => $wallet_info->name,
                'externalId' => $wallet_info->text_address,
                'balances' => [
                    'activatedAt' => $wallet_info->created_at,
                    'pointsAmount' => $wallet_info->balance,
                    'statusCode' => $wallet_info->status,
                ],
                'user' => [
                    'firstName' => $wallet_info->user_name,
                    'lastName' => $wallet_info->user_lastname,
                    'cellPhone' => $wallet_info->phone,
                ]
            ],
            'requestId' => 'vz'.time()."pn",
            'operationId' => (new Operation())->make('ASK_GIFT_CARD_INFO',$partnerCode,$walletId)
        ]);

    }

    public function cardWriteOff(WriteOffRequest $request)
    {

        $walletId = $request->input('writeOffRequest.cardIdentifier.externalId');
        $amount = $request->input('writeOffRequest.bonusAmount');
        $partnerCode = $request->input('partnerInfo.partnerCode');

        $wallet = new Wallet($walletId);



        return response([
            'balance' => $wallet->writeOff($amount),
            'partnerCode' => $partnerCode,
            'requestId' => 'vz'.time()."pn",
            'operationId' => (new Operation())->make('WRITE_OFF',$partnerCode,$walletId,$amount)
        ]);

    }

    public function cardCalculateDiscount(CalculateDiscountRequest $request)
    {

        $walletId = $request->input('purchaseRequest.cardIdentifier.externalId');
        $partnerCode = $request->input('partnerInfo.partnerCode');

        $wallet = new Wallet($walletId);

        return response([
            'discountOrder' => [
                'discountAmount' => $wallet->getBalance(),
            ],
            'partnerCode' => $partnerCode,
            'requestId' => 'vz'.time()."pn",
            'operationId' => (new Operation())->make('DISCOUNT_CALCULATION',$partnerCode,$walletId)
        ]);

    }

    public function cardPurchase(CardPurchaseRequest $request)
    {

        $partnerCode = $request->input('partnerInfo.partnerCode');
        $walletId = $request->input('purchaseRequest.cardIdentifier.externalId');

        return response([
            'partnerCode' => $partnerCode,
            'operationId' => (new Operation())->make('PURCHASE',$partnerCode,$walletId),
            'requestId' => 'vz'.time()."pn",
        ]);

    }

    public function getOperationInfo(OperationInfoRequest $request)
    {

        if($request->has('operationsRequest.cancelled')){
            $cancelled = $request->input('operationsRequest.cancelled');
            if(gettype($cancelled) !== "boolean"){
                if($cancelled === 1)
                    $cancelled = true;
                if($cancelled === 0)
                    $cancelled = false;
            }
        }
        else $cancelled = null;

        if($request->has('operationsRequest.types'))
            $types_arr = $request->input('operationsRequest.types');
        else $types_arr = null;

        if($request->has('operationsRequest.order'))
            $order = $request->input('operationsRequest.order');
        else $order = "DESC";

        if($request->has('purchaseRequest.cardIdentifier.externalId'))
            $walletId = $request->input('purchaseRequest.cardIdentifier.externalId');
        else $walletId = null;

        if($request->has('operationsRequest.dateFrom')) {
            $dateFrom = $request->input('operationsRequest.dateFrom');
            $date = strtotime($dateFrom);
            $dateFrom = date('Y-m-d H:i:s',$date);
        }
        else $dateFrom = null;

        if($request->has('operationsRequest.dateTo'))
        {
            $dateTo = $request->input('operationsRequest.dateTo');
            $date = strtotime($dateTo);
            $dateTo = date('Y-m-d H:i:s',$date);
        }
        else $dateTo = null;

        $partnerCode = $request->input('partnerInfo.partnerCode');

        $operation_mod = new Operation;

        $operations = $operation_mod
            ->getList($partnerCode,$walletId,$cancelled,$types_arr,$order,1000,$dateFrom,$dateTo);

        $operations_info = [];
        foreach ($operations as $operation){

            if($operation->cancelled === 1)
                $cancel = true;
            else $cancel = false;

            $operations_info[] = [
                'identifier' => $operation->id,
                'operationDate' => $operation->created_at,
                'operationTypeCode' => $operation->operation_type_code,
                'pointsAmount' => $operation->points_spend_amount,
                'externalId' => $operation->externalId,
                'cancelled' => $cancel,
                'earnedPoints' => $operation->points_earned_amount,
            ];
        }

        return response([
            'operations' => $operations_info,
            'requestId' => 'vz'.time()."pn",
            'operationId' => (new Operation())->make('ASK_CARD_OPERATIONS',$partnerCode,$walletId)
        ]);

    }

    public function refundOperation(RefundRequest $request)
    {

        $partnerCode = $request->input('partnerInfo.partnerCode');

        $walletId = $request->input('refundRequest.cardIdentifier.externalId');

        $operationId = $request->input('refundRequest.operationId');

        $operation = new Operation($operationId);

        if($request->has('refundRequest.refundAmount'))
            $refundAmount = $request->input('refundRequest.refundAmount');
        else $refundAmount = null;

        $operation->refund($partnerCode,$walletId,$refundAmount);

        return response([
            'partnerCode' => $partnerCode,
            'requestId' => 'vz'.time()."pn",
            'operationId' => (new Operation())->make('REFUND',$partnerCode,$walletId)
        ]);

    }

    public function searchCard(CardSearchRequest $request)
    {
        $params = [];

        $partnerCode = $request->input('partnerInfo.partnerCode');

        if($request->has('UserForm.lastName'))
            $params['lastName'] = $request->input('UserForm.lastName');

        if($request->has('UserForm.firstName'))
            $params['firstName'] = $request->input('UserForm.firstName');

        if($request->has('UserForm.middleName'))
            $params['middleName'] = $request->input('UserForm.middleName');

        if($request->has('UserForm.birthDate')) {
            $birthDate = $request->input('UserForm.birthDate');
            $date = strtotime($birthDate);
            $params['birthDate'] = date('Y-m-d',$date);
        }

        if($request->has('UserForm.gender'))
            $params['gender'] = $request->input('UserForm.gender');

        if($request->has('UserForm.email'))
            $params['email'] = $request->input('UserForm.email');

        if($request->has('UserForm.city'))
            $params['city'] = $request->input('UserForm.city');
        else $city = null;

        $phone = $request->input('UserForm.cellPhone');

        $wallets = (new Wallet())->search($partnerCode,$phone,$params);

        $walletsInfo = [];

        foreach ($wallets as $wallet){

            $walletsInfo[] = [
                'externalId' => $wallet->text_address,
                'cardName' => $wallet->wallet_name,
                'user' => [
                    'lastName' => $wallet->last_name,
                    'firstName' => $wallet->user_name,
                    'middleName' => $wallet->middle_name,
                    'birthDate' => $wallet->birth_date,
                    'gender' => $wallet->gender,
                    'cellPhone' => $wallet->phone,
                    'email' => $wallet->email,
                ]
            ];

        }


        return response([
            'userCard' => $walletsInfo,
            'operationId' => (new Operation())->make('SEARCH_USER_CARD',$partnerCode)
        ]);

    }

}
