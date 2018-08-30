<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'product'       => ['required','between:10,150'],
            'shipping'      => ['required','between:10,150'],
            'price'         => ['required','numeric']
        ];
    }

    public function attributes()
    {
        return [
            'product'       => 'Name of Product',
            'shipping'      => 'Shipping Address',
            'price'         => 'Price'
        ];
    }

    public function messages()
    {
        return [
            '*.required'    => ':attribute is required',
            '*.between'     => ':attribute is must between 10 and 150 digits',
            '*.numeric'     => ':attribute is must numeric'
        ];
    }
}
