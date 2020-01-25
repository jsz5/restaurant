<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return[
            'name' => 'required|max:10',
            'email' => 'required|email',
            'msg' => 'required',
        ];

    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [];
    }
}
