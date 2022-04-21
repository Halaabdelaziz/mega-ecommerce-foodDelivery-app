<?php 
namespace App\Http\Interfaces;

interface CartInterface
{
    public function addToCart($request);
    public function update ($request);
    public function delete ($request);
    public function userCart();
}