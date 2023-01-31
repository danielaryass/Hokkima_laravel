<?php

namespace App\Http\Requests\cart;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
             'name' => [
                'required', 'string', 'max:255',
            ],
            'quantity' => [
                'required', 'integer',
            ],
            'price' => [
                'required', 'string', 'max:255',
            ],

            'image' => [
                'nullable',
            ],
        ];
    }
}
