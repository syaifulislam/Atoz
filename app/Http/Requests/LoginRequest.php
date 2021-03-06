<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username'      => ['required'],
            'password'      => ['required','min:6']
        ];
    }

    public function attributes()
    {
        return [
            'username'      => 'Username',
            'password'      => 'Password'
        ];
    }

    public function messages()
    {
        return [
            '*.required'    => ':attribute is required',
            '*.min'         => ':attribute is min 6  character',
        ];
    }
}
