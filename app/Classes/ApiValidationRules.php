<?php

namespace App\Classes;


use Illuminate\Validation\Rule;

class ApiValidationRules
{

    public static function partnerInfo($entity_name)
    {

        return [
            $entity_name.'.requestId' => 'string',
            $entity_name.'.partnerCode' => 'required|string|exists:partners,partner_id',
            $entity_name.'.requestDate' => 'string',
            $entity_name.'.orderId' => 'string',
            $entity_name.'.userIdentifier' => 'string',
            $entity_name.'.currency' => 'string'
        ];

    }

    public static function userForm($entity_name)
    {

        return [
            $entity_name.'.lastName' => 'string',
            $entity_name.'.firstName' => 'string',
            $entity_name.'.middleName' => 'string',
            $entity_name.'.birthDate' => 'string',
            $entity_name.'.gender' => [
                'string',
                Rule::in(['MALE', 'FEMALE']),
            ],
            $entity_name.'.cellPhone' => 'string|regex:/^((\+7)+([0-9]){10})$/',
            $entity_name.'.email' => 'email',
            $entity_name.'.city' => 'string',
            $entity_name.'.additionalInfo' => 'string',
            $entity_name.'.id' => 'numeric',
        ];

    }

    public static function cardIdentifier($entity_name,$extIdRequired = true)
    {

        if($extIdRequired === false)
            $extIdField = 'string|exists:wallets,text_address';
        else
            $extIdField = 'required|string|exists:wallets,text_address';

        return [
            $entity_name.'.barcode' => 'string',
            $entity_name.'.hash' => 'string',
            $entity_name.'.magneticTrackIdentifier' => 'string',
            $entity_name.'.pin' => 'string',
            $entity_name.'.phone' => 'string|regex:/^((\+7)+([0-9]){10})$/',
            $entity_name.'.externalId' => $extIdField
        ];


    }

    public static function purchaseOrder($entity_name)
    {

        return [
            $entity_name.'.amount' => 'string|required',
            $entity_name.'.orderDate' => 'string|required',
            $entity_name.'.number' => 'string|required',
            $entity_name.'.goods' => 'array',
            $entity_name.'.payments' => 'array',
        ];


    }

}