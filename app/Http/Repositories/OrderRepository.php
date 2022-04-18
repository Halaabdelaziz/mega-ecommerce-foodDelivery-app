<?php

namespace App\Http\Repositories;

use App\Models\cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Orderitem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ApiResponceTrait;
use App\Http\Interfaces\OrderInterface;
use App\Rules\Cart\OrderStockValidation;
use Illuminate\Support\Facades\Validator;

class OrderRepository implements OrderInterface
{

    use ApiResponceTrait;
    public function checkout($request)
    {
        $validation = Validator::make($request->header(), [
            'authorization' => new OrderStockValidation()

        ]);
        if ($validation->fails()) {
            return $this->apiResponce(400, 'validation error ', $validation->errors());
        }
        $cartItems = cart::where('user_id', auth()->user()->id)->with('products')->get();
        $totalPrice = 0;

        $totalPrice = $cartItems->sum(function ($item) {
            return $item->count * $item->products->price;
        });

        DB::transaction(function () use ($totalPrice, $cartItems,$request) {
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'delivery_fee'=>35,
                'totalprice' => $totalPrice 
            ]);

            foreach ($cartItems as $cartItem) {
            Orderitem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->products->id,
                    'count' => $cartItem->count,
                    'unit_price' => $cartItem->products->price,
                    'delivery_fee' =>$order->delivery_fee,
                    'net_price' => ($cartItem->count * $cartItem->products->price) ,
                    'adress'=> $request->adress,
                    'email'=> Auth::user()->email
                ]);
            }
            $product = Product::find($cartItem->products->id);
            $product->update(['stock' => $product->stock - $cartItem->count]);
            $cartItem->delete();
        });
        
       
        return $this->orderDetails();
    }
    public function orderDetails(){
        $order=Order::latest()->first();
        $order_items=Orderitem::with('order:id,totalprice')->where('order_id',$order->id)->get();
        $data= $order_items;
        return $this->apiResponce(200,'Order was created',null,$data);


    }
   
}
