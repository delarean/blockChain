<?php

namespace App\Classes;


use Illuminate\Support\Facades\DB;

class SelectRawSql
{

    public static function selectWalletInfo($walletId)
    {

        $sql_statement = 'SELECT w.id wallet_id,w.text_address,w.name,wup.user_id,wb.balance,w.status,
                          w.created_at,wup.user_name,wup.user_lastname,wup.phone  
                          FROM wallets w
                          JOIN wallets_balance wb ON w.id = wb.wallet_id
                          JOIN (SELECT wu.user_id user_id,wu.wallet_id wall_id,up.name user_name,
                          up.last_name user_lastname,up.phone
                          FROM wallets_users wu
                          JOIN (SELECT p.id partner_id,u.id user_id,u.name,u.last_name,u.phone 
                          FROM users u 
                          JOIN partners p ON u.id = p.user_id) up ON wu.user_id = up.user_id) wup
                          ON w.id = wup.wall_id
                          WHERE w.text_address = :wall_id
                          ';



        $walletInfo = DB::select($sql_statement,
            [
                'wall_id' => $walletId,
            ])[0];

        return $walletInfo;

    }

    public static function selectOperationsList($partnerCode,$walletId = null,$cancelled = true,array $types_arr = [],$order = "DESC",$limit = 1000,$dateFrom,$dateTo)
    {
        if($cancelled === true || $cancelled === 'true')
            $cancelled = 1;
        else
            $cancelled = 0;

        $params_arr = [
            'canc' => $cancelled,
            'pCode' => $partnerCode,
            ];


        $sql_statement = "SELECT id,created_at,operation_type_code,points_spend_amount,
                          externalId,partner_code,cancelled,points_earned_amount
                          FROM operations 
                          WHERE partner_code = :pCode
                          AND cancelled = :canc
                          ";

        if($walletId !== null) {
            $sql_statement .= "AND externalId= :wallId";
            $params_arr[] = ['wallId' => $walletId];
        }

        if(!empty($types_arr)){
            $list = '';
            $i = 0;
            foreach ($types_arr as $type){

                if($i !== 0)
                    $list .= ',';

                $list .= '"'.$type.'"';

                $i++;

            }
            $sql_statement .= "AND operation_type_code IN ($list) ";
        }

        if(!is_null($dateFrom) && !is_null($dateTo))
            $sql_statement .= "AND created_at BETWEEN \"$dateFrom\" AND \"$dateTo\" ";
        elseif (!is_null($dateFrom))
            $sql_statement .= "AND created_at >= \"$dateFrom\" ";
        elseif (!is_null($dateTo))
            $sql_statement .= "AND created_at <= \"$dateTo\" ";


        $sql_statement .= "ORDER BY created_at ".$order." LIMIT ".$limit;


        $operations = DB::select($sql_statement, $params_arr);

        return $operations;

    }

    public static function selectCards($partnerCode,$phone,$params)
    {

        $sql_statement = "SELECT w.text_address,w.name wallet_name,u.name user_name,u.middle_name,u.birth_date,
                          u.gender,u.last_name,u.phone,u.email
                          FROM users u";


        $params_arr = [
            'phone' => $phone,
            'partId' => $partnerCode
        ];

        $sql_statement .= " JOIN (SELECT partner_id,user_id
                            FROM partners 
                            WHERE partner_id=:partId
                            ) p ON u.id = p.user_id 
                            JOIN (SELECT wu.user_id,w.text_address,w.name
                            FROM wallets_users wu
                            JOIN wallets w ON w.id=wu.wallet_id
                            ) w ON w.user_id=u.id
                            WHERE phone=:phone";

        if(isset($params['lastName'])){
            $sql_statement .= " AND last_name=:lastName ";
            $params_arr['lastName'] = $params['lastName'];
        }
        if(isset($params['firstName'])){
            $sql_statement .= " AND name=:firstName ";
            $params_arr['firstName'] = $params['firstName'];
        }
        if(isset($params['middleName'])){
            $sql_statement .= " AND middle_name=:middleName ";
            $params_arr['middleName'] = $params['middleName'];
        }
        if(isset($params['birthDate'])){
            $sql_statement .= " AND birth_date=:birthDate ";
            $params_arr['birthDate'] = $params['birthDate'];
        }
        if(isset($params['gender'])){
            $sql_statement .= " AND gender=:gender ";
            $params_arr['gender'] = $params['gender'];
        }
        if(isset($params['email'])){
            $sql_statement .= " AND email=:email ";
            $params_arr['email'] = $params['email'];
        }

        $wallets = DB::select($sql_statement, $params_arr);

        return $wallets;

    }

    public static function selectTransactions($walletId,$limit)
    {
        $sql_statement = "
              SELECT t.id,hash,block_hash,amount,tx_fee,
              ws.text_address sender_address,wr.text_address recipient_address,comment,
              CASE 
              WHEN TIMESTAMPDIFF(MINUTE ,t.created_at,NOW())%60<>0
              THEN CONCAT(ROUND(TIMESTAMPDIFF(MINUTE ,t.created_at,NOW())/60),\" часов \",
              TIMESTAMPDIFF(MINUTE ,t.created_at,NOW())%60,\" минут \")
              ELSE CONCAT(TIMESTAMPDIFF(MINUTE ,t.created_at,NOW())/60,\" часов \")
              END as age,
              sender_wallet_id,
              recipient_wallet_id
              FROM transactions t
              JOIN wallets ws
              ON ws.id=t.sender_wallet_id
              JOIN wallets wr
              ON wr.id=t.recipient_wallet_id
              WHERE sender_wallet_id=:walletId
              OR recipient_wallet_id=:walletId2";

        if(!is_null($limit))
            $sql_statement .= " LIMIT $limit";

        $params_arr = [
            'walletId' => $walletId,
            'walletId2' => $walletId,
        ];

        $transactions = DB::select($sql_statement,$params_arr);

        return $transactions;

    }

}