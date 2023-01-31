<?php

namespace App\Http\Requests\DetailUser;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CurrentPassword;
use Illuminate\Support\Facades\Auth;
class UpdatePasswordRequest extends FormRequest
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
            'current_password' => ['required', 'string', new CurrentPassword()],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
