<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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
            'name'=>'required|string|max:50',
            'phone'=>'required|max:13|min:11',
            'address'=>'required',
            'description'=>'required|string|max:255|min:5',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            //
            'name.required' => 'Name is required!',
            'phone.required' => 'A title is required',
            'phone.max' => 'A title is required',
            'phone.min' => 'A title is required',
            'address.required' => 'A message is required',
        ];
    }
}
