<?php

namespace App\Http\Repositories;

use App\Models\cart;
use App\Models\order;
use App\Models\Product;
use App\Models\orderitem;
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

        DB::transaction(function () use ($totalPrice, $cartItems) {
            $order = order::create([
                'user_id' => Auth::user()->id,
                'totalprice' => $totalPrice
            ]);

            foreach ($cartItems as $cartItem) {
                orderitem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->products->id,
                    'count' => $cartItem->count,
                    'unit_price' => $cartItem->products->price,
                    'net_price' => $cartItem->count * $cartItem->products->price
                ]);
            }
            $product = Product::find($cartItem->products->id);
            $product->update(['stock' => $product->stock - $cartItem->count]);
            $cartItem->delete();
        });
       
        return $this->apiResponce(200,'Order was created');
    }
}
