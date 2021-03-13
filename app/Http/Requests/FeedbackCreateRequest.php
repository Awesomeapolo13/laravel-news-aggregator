<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackCreateRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:20'],
            'comment' => ['required', 'string', 'max:250'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'A :attribute is required',
            'string' => 'A :attribute must be type of string',
            'max' => 'A :attribute must have length not more :max symbols'
        ];
    }
}
