<?php

namespace App\Http\Requests;

use App\Classes\ApiValidationRules;

class OperationInfoRequest extends ApiRequest
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
            'operationsRequest' => 'required|array',
            'operationsRequest.dateFrom' => 'date',
            'operationsRequest.dateTo' => 'date',
            'operationsRequest.cancelled' => 'boolean',
            'operationsRequest.types' => 'array',
            'operationsRequest.order' => 'in:ASC,DESC',
            'operationsRequest.cardIdentifier' => 'array'
        ],
            ApiValidationRules::partnerInfo('partnerInfo'),
            ApiValidationRules::cardIdentifier('operationsRequest.cardIdentifier')
        );
    }
}
