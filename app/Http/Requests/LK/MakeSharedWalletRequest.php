<?php

namespace App\Http\Requests\LK;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class MakeSharedWalletRequest extends FormRequest
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
        return [
            'wallet_name' => 'required|max:255|string',
            'user_name' => 'required|max:255|string'
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw (new ValidationException($validator))
            ->errorBag('shared')
            ->redirectTo(route('newWallet'));
    }
}
