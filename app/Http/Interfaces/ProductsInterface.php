<?php 
namespace App\Http\Interfaces;
use Illuminate\Http\Request;

interface ProductInterface{
    public function index();
    public function create();
    public function store($request);
    public function show($id);
    public function edit($id);
    public function update($request, $id);
    public function destroy($id);

}