<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'description'=>'required|max:13|min:11',
            'price'=>'required',
            'category_id'=>'required',
            'restaurant _id'=>'required',
            'stock'=>'required|string|max:255|min:5',
    
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            //
            'name.required' => 'Name is required!',
            'name.string' => 'name is must be string',
            'description.required'=>'A description is required!',
            'description.string'=>'description is must be string',
            'description.min'=>'description min character is 5',
            'description.max'=>'description max character is 255',
            'price.required'=>'price is required',
            'stock.required'=>'stock is required',
            'stock.string'=>'description is must be string',
            'stock.min'=>'description min character is 5',
            'stock.max'=>'description max character is 255',
            'image.required'=>'image is required',
            'image.image'=>'image must be an image',
            'image.mimes'=>'image extensions must be in (jpg,png,jpeg,gif,svg)',
            'image.max'=>'image length max is 2048',
          

        ];
    }
}
