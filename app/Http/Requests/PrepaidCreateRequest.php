<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrepaidCreateRequest extends FormRequest
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
            'mobile'    => ['required','numeric','digits_between:7,12','regex:(081)'],
            'value'     => ['required']
        ];
    }

    public function attributes()
    {
        return [
            'mobile'    => 'Mobile Phone Number',
            'value'     => 'Value'
        ];
    }

    public function messages()
    {
        return [
            '*.required'        => ':attribute is required',
            '*.numeric'         => ':attribute is must digits',
            '*.digits_between'  => ':attribute is must between 7 and 12 digits',
            '*.regex'           => ':attribute is must start with 081'
        ];
    }
}
