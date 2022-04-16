<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Interfaces\ProductInterface;

class ProductController extends Controller
{
 
    protected $ProductInterface;
        
    public function __construct(ProductInterface $ProductInterface)
    {
            $this->ProductInterface=$ProductInterface;
    }
    
    public function index(){
        
            return $this->ProductInterface->index();
            }
  public function productDetails($id){
        return $this->ProductInterface->productDetails($id);

  }
}
