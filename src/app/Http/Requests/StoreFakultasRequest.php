<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFakultasRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'fakultasname' => [
                'string', 
                'required',
            ],
            'name' => [
                'string', 
                'required',
            ],
            'nim' => [
                'string', 
                'required',
            ],
            'prodi' => [
                'string', 
                'required',
            ],
        ];
    }
}
