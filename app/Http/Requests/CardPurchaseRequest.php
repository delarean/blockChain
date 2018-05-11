<?php

namespace App\Http\Requests;

use App\Classes\ApiValidationRules;

class CardPurchaseRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge([
            'partnerInfo' => 'required|array',
            'purchaseRequest' => 'required|array',
            'purchaseRequest.writeOffOperationId' => 'required',
            'purchaseRequest.order' => 'required|array',
        ],
            ApiValidationRules::partnerInfo('partnerInfo'),
            ApiValidationRules::cardIdentifier('purchaseRequest.cardIdentifier'),
            ApiValidationRules::purchaseOrder('purchaseRequest.order')
        );
    }
}
