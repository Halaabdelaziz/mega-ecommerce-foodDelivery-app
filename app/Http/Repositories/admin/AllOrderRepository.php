<?php 
namespace App\Http\Repositories\admin;

use App\Models\orderitem;
use App\Http\Resources\admin\AllOrdersResource;
use App\Http\Interfaces\admin\AllOrdersInterface;

class AllOrderRepository implements AllOrdersInterface {

    public function index(){
        $orders = AllOrdersResource::collection(orderitem::all()); 
            return view('dashboard.allOrders.index',['orders'=>$orders]);
    }
    public function edit($id){
        $order = orderitem::find($id);
        return view('dashboard.allOrders.edit',$order);
    }
    
    public function update($request,$id){
        $order = orderitem::find($id);
        $order->status=$request->status;
        $order->save();
        return redirect()->route('getOrders');
    }
}
?>