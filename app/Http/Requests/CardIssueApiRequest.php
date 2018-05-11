<?php

namespace App\Http\Requests;

use App\Classes\ApiValidationRules;
use App\Exceptions\UserApiException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;


class CardIssueApiRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge([
            'partnerInfo' => 'required|array',

        ],ApiValidationRules::partnerInfo('partnerInfo'));
    }

    protected function failedValidation(Validator $validator) {
        throw new UserApiException('validation_error',['message' => $validator->errors()->first()]);
    }
}
