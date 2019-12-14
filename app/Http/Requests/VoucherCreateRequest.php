<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoucherCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return[
            'discount' => 'required|numeric|min:0.01|max:1'
        ];

    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'discount.required'=>'Wartość promocji jest wymagania',
            'numeric.numeric'=>'Błędny format',
            'numeric.min'=>'Błędny zakres',
            'numeric.max'=>'Błędny zakres',
        ];
    }
}
