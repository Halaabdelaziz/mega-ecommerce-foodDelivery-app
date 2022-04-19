<?php

namespace App\Http\Repositories;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ApiResponceTrait;
use App\Http\Interfaces\CartInterface;


class CartRepository implements CartInterface{

    use ApiResponceTrait;

    public function addToCart($request){
      
    
      $cart= Cart::where([['product_id',$request->product_id],['user_id',Auth::user()->id]])->first();
      if($cart){
          $cart->update([
          'count'=> $cart->count + $request->count
      ]);
      }else{
        $cart=  Cart::create([
            'user_id'=> Auth::user()->id,
            'product_id'=>$request->product_id,
            'restaurant_id'=>$request->restaurant_id,
            'count'=> $request->count 
        ]);
      }
    
      return $this->apiResponce(200,'added to cart',null,$cart);


    }
    public function update ($request){
      
        
        $cart = Cart::where([['user_id',Auth::user()->id],['product_id',$request->product_id]])->first();
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

        $cart= Cart::with('restaurants:id,name','products:id,name,price,image,description')->where('user_id',Auth::user()->id)->select('product_id','count','restaurant_id')->get();
        return $this->apiResponce(200,'user cart ',null,$cart);
    }
    
}