<?php 
namespace App\Http\Repositories;

use App\Models\Product;
use App\Http\Traits\ApiResponceTrait;
use App\Http\Resources\productResource;
use App\Http\Interfaces\ProductInterface;
use App\Http\Resources\restaruntResource;

class ProductRepository implements ProductInterface{

    use ApiResponceTrait;
    
      
    private $productModel;
    
    public function __construct(Product $Product )
    {
     $this->productModel=$Product;   
    }
    
    public function index(){
        
        $products=$this->productModel::select('id','name','price','image')->get();
        return $this->apiResponce(200,'All products',null,$products);
            
    }
    public function  productDetails($id){ 
        $product= new productResource($this->productModel::with('category:id,name','restarunt:id,name')->firstWhere('id',$id));
       return $this->apiResponce(200,'product details',null, $product);

   }
}