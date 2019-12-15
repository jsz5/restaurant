<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddVoucherToOrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return[
            'token' => 'required',
            'discount_token' => 'required'
        ];

    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'token.required'=>'Token dania jest wymagany',
            'discount_token.required'=>'Kod promocyjny jest wymagany'
        ];
    }
}
