<?php

namespace App\Http\Requests\DetailUser;

use Illuminate\Foundation\Http\FormRequest;
// use model detail user
use App\Models\ManagementAccess\DetailUser;
use Symfony\Component\HttpFoundation\Response;
// this rule only at update request
use Illuminate\Validation\Rule;
class UpdateDetailUserRequest extends FormRequest
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
            [
            'photo' => [
                'image'
            ],
            ]
        ];
    }
}
