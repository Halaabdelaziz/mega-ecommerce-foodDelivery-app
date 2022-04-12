<?php

namespace App\Http\Requests\Auth;


use App\Models\User;
use App\Http\Traits\ApiResponceTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
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
        return ['name'=>'required|string|min:3',
        'email'=>'required|string|unique:users,email',
        'password'=>'required|string|confirmed|min:8'];
    }
    public function failedValidation( $validator)
    {
        $response= $this->apiResponce(404,'validation error',$validator->errors());
       
        throw (new ValidationException($validator, $response))->status(400);
    }
}
