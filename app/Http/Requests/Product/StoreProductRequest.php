<?php

namespace App\Http\Requests\Product;


use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;


class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
          abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'nama' => [
                'required', 'string', 'max:255',
            ],
            'tipe' => [
                'required', 'string', 'max:255',
            ],
            'qty' => [
                'required', 'integer',
            ],
            'harga' => [
                'required', 'string', 'max:255',
            ],
            'deskripsi' => [
                'required',
            ],
            'photo' => [
                'nullable', 'mimes:jpeg,svg,png', 'max:10000',
            ],
        ];
    }
}
