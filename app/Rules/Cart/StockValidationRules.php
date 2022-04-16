<?php

namespace App\Rules\Cart;

use App\Models\cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Rule;

class StockValidationRules implements Rule
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
        
   $product =Product::where([['id',request('product_id')],['stock','>=',$value]])->first();
   if($product){
     $cart= cart::where([['product_id',request('product_id')],['user_id',Auth::user()->id]])->first();
     if($cart){
         if($cart->count + $value <= $product->stock){
             return true;
         }
         return false; 
     } 
     return true; 

   }
   return false;
   
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Stock not found';
    }
}
