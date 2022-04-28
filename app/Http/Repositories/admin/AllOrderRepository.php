<?php 
namespace App\Http\Repositories\admin;

use App\Models\orderitem;
use App\Http\Interfaces\admin\AllOrdersInterface;

class AllOrderRepository implements AllOrdersInterface {

    public function index(){
        $orders = orderitem::with('products:name,id')->get(); 
        dd($orders);
            return view('dashboard.allOrders.index',['orders'=>$order]);
    }
}
?>