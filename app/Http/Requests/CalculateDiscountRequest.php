<?php

namespace App\Http\Requests;

use App\Classes\ApiValidationRules;

class CalculateDiscountRequest extends ApiRequest
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
        ],
            ApiValidationRules::partnerInfo('partnerInfo'),
            ApiValidationRules::cardIdentifier('purchaseRequest.cardIdentifier')
        );
    }
}
