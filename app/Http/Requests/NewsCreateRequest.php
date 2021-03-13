<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsCreateRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:20'],
            'description' => ['sometimes'],
            'status' => ['required', 'string', 'min:3', 'max:20'],
            'category_id' => ['required', 'array', 'min:1'],
        ];
    }


    public function messages()
    {
        return [
            'required' => 'A :attribute is required',
            'string' => 'A :attribute must be type of string',
            'array' => 'A :attribute must be type of array',
            'min' => 'A :attribute must have length not less :min symbols',
            'max' => 'A :attribute must have length not more :max symbols'
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'category select',
            'status' => 'status select'
        ];
    }
}
