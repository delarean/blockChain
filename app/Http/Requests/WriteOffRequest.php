<?php

namespace App\Http\Requests;

use App\Classes\ApiValidationRules;

class WriteOffRequest extends ApiRequest
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
            'writeOffRequest' => 'required|array',
            'writeOffRequest.cardIdentifier' => 'required|array',
            'writeOffRequest.bonusAmount' => 'required|numeric',
        ],
            ApiValidationRules::partnerInfo('partnerInfo'),
            ApiValidationRules::cardIdentifier('writeOffRequest.cardIdentifier')
        );
    }
}
