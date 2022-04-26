<?php

namespace App\Http\Requests\Cart;

use App\Http\Traits\ApiResponceTrait;
use App\Rules\Cart\StockValidationRules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CartRequest extends FormRequest
{
    use ApiResponceTrait;
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
           'product_id'=>'required|exists:products,id',
           'count'=>['required', new StockValidationRules()],
        ];
    }
    public function failedValidation( $validator)
    {
        $response= $this->apiResponce(404,'validation error',$validator->errors());
       
        throw (new ValidationException($validator, $response))->status(400);
    }
    
    public function messages(){
        return[
            'product_id.required'=>'product_id is required',
            'count'=> 'quantity of product is required',
             
        ];
        
    }
    
}
