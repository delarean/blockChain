<?php

namespace App\Http\Requests;

use App\Classes\ApiValidationRules;

class RefundRequest extends ApiRequest
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
            'refundRequest' => 'required|array',
            'refundRequest.cardIdentifier' => 'required|array',
            'refundRequest.operationId' => 'required|numeric|exists:operations,id',
            'refundRequest.refundAmount' => 'numeric'
        ],
            ApiValidationRules::partnerInfo('partnerInfo'),
            ApiValidationRules::cardIdentifier('refundRequest.cardIdentifier')
        );
    }
}
