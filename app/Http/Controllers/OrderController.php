<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Interfaces\OrderInterface;


class OrderController extends Controller
{
    
    protected $OrderInterface;
        
    public function __construct(OrderInterface $OrderInterface)
    {
            $this->OrderInterface=$OrderInterface;
    }
    public function checkout(Request $request){
          return $this->OrderInterface->checkout($request);
    }
    public function orderDetails(){
        return $this->OrderInterface->orderDetails();

    }
    public function userOrder($id){
        return $this->OrderInterface->userOrder($id);
    }
    public function userOrders(){
        return $this->OrderInterface->userOrders();
    }
}
