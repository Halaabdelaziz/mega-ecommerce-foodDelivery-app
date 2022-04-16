<?php

namespace App\Http\Repositories;

use App\Models\cart;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ApiResponceTrait;
use App\Http\Interfaces\CartInterface;


class CartRepository implements CartInterface{

    use ApiResponceTrait;

    public function addToCart($request){
      
    
      $cart= cart::where([['product_id',$request->product_id],['user_id',Auth::user()->id]])->first();
      if($cart){
          $cart->update([
          'count'=> $cart->count + $request->count
      ]);
      }else{
        $cart=  cart::create([
            'user_id'=> Auth::user()->id,
            'product_id'=>$request->product_id,
            'count'=> $request->count 
        ]);
      }
    
      return $this->apiResponce(200,'added to cart',null,$cart);


    }
    public function update ($request,$id){
        $cart_id=cart::find($id);
        
        $cart = Cart::where([['user_id',Auth::user()->id],['product_id',$cart_id->product_id]])->first();
        if($cart){
            $cart->update([
                'count'=>$request->count
            ]);
            return $this->apiResponce(200,'cart updated');
        }
        return $this->apiResponce(400,'cart not found');

    }
    public function delete ($id){
       
            $cart= Cart::find($id);
            if(is_null($cart)){
                return $this->apiResponce(400,' cart not found');
            }
            $cart->delete();
            return $this->apiResponce(200,'cart deleted');
            
        
    }

    public function userCart(){

        $cart= cart::with('products:id,name,price')->where('user_id',Auth::user()->id)->get();
        return $this->apiResponce(200,'user cart ',null,$cart);
    }
    
}