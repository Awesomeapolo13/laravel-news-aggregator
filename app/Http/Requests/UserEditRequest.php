<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:35'],
            'email' => ['required', 'string', 'email:rfc,dns'],
            'is_admin' => ['required', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'A :attribute is required',
            'string' => 'A :attribute must be type of string',
            'boolean' => 'A :attribute must be type of boolean',
            'min' => 'A :attribute must have length not less :min symbols',
            'max' => 'A :attribute must have length not more :max symbols',
            'email' => 'A :attribute must be a valid email'
        ];
    }

    public function attributes()
    {
        return [
            'is_admin' => 'group'
        ];
    }
}
