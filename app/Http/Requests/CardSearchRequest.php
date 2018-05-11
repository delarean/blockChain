<?php

namespace App\Http\Requests;

use App\Classes\ApiValidationRules;

class CardSearchRequest extends ApiRequest
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
            'UserForm' => 'required|array',
        ],
            ApiValidationRules::userForm('UserForm')
        );
    }
}
