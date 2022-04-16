<?php 
namespace App\Http\Interfaces;

interface CartInterface
{
    public function addToCart($request);
    public function update ($request,$id);
    public function delete ($id);
    public function userCart();
}