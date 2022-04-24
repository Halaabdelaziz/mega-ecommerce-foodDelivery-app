<?php

namespace App\Rules\Cart;

use Illuminate\Support\Facades\App;
use App\Models\cart;
use Illuminate\Contracts\Validation\Rule;

class OrderStockValidation implements Rule
{
  
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $cartItems = cart::where('user_id', auth()->user()->id)->with('products')->get();
        if(count($cartItems) == 0){
            return false ;
        }
        foreach($cartItems as $cartItem){
            if($cartItem->products->stock < $cartItem->count){
                return false;
            }
          
        }
        return true ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'stock error or cart empty ';
    }
}
