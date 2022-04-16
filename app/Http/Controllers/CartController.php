<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Interfaces\CartInterface;
use App\Http\Requests\Cart\CartRequest;


class CartController extends Controller
{
   protected $cartInterface;

   public function __construct(CartInterface $cartInterface)
   {
       $this->cartInterface=$cartInterface;
   }
   public function addToCart(CartRequest $request){
       return $this->cartInterface->addToCart($request);
   }
   public function update ( CartRequest $request,$id){
    return $this->cartInterface->update($request,$id);
   }
   public function delete ($id){
    return $this->cartInterface->delete($id);
   }
   public function userCart(){
       return $this->cartInterface->userCart();
   }
}
