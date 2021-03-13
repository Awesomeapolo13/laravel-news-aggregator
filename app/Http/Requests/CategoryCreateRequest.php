<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Если возвращает true, то работа этой формы разрешена всем. Можно включить доп проверку на роль
        // и разрешить работу с формой только админам
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
            'description' => ['sometimes'] //указывает на то что поле может отсутствовать
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is required'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'This field'
        ];
    }
}
