<?php 
namespace App\Http\Interfaces;

interface OrderInterface
{
    
    public function checkout($request);
    public function orderDetails();

}