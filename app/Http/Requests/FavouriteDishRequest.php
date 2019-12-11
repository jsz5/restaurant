<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FavouriteDishRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return[
            'id' => 'required'
        ];

    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'id.required'=>'Id dania jest wymagane'
        ];
    }
}
