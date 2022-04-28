<?php
namespace App\Http\Interfaces\admin;

interface AllOrdersInterface{
    public function index();
    public function edit($id);
    public function update($request,$id);
}
