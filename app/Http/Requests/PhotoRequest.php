<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {

        return[
            'file' => 'required|base64image:5000'
        ];

    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'file.required'=>'Zdjęcie jest wymagane',
            'file.base64image'=>'Zdjęcie jest niepoprawne',
        ];
    }
}
