<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            //
            'name'=>'required|string|min:4|max:255'
        ];
    }
    public function messages()
    {
        return [
            //
            'name.require'=>'name is required',
            'name.string'=>'name must be string',
            'name.min'=>'min character is 4',
            'name.max'=>'max character is 255'
        ];
    }
}
