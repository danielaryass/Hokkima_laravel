<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Gate;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
// this rule only at update request
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //create middleware from kernel at here
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN,'403 Forbidden');
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
                'required', 'string', 'max:255'
            ],
            'email' => [
                'required', 'email', 'max:255', Rule::unique('users')->ignore($this->user),
                // Rule unique only works for other record id
            ],

            // add validation for role this here 
        ];
    }
}
