<?php 
namespace App\Http\Repositories;

use App\Models\Product;
use App\Http\Traits\ApiResponceTrait;
use App\Http\Interfaces\ProductInterface;



class ProductRepository implements ProductInterface{

    use ApiResponceTrait;
    
      
    private $productModel;
    
    public function __construct(Product $Product )
    {
     $this->productModel=$Product;   
    }
    
    public function index(){
        
        $products=$this->productModel::select('id','name','price','stock',)->get();
        return $this->apiResponce(200,'All products',null,$products);
            
    }
    public function  productDetails($id){
         
        $product = $this->productModel::where('id',$id)->with('restarunt:id,name')->get();

       return $this->apiResponce(200,'product details ',null,$product);

   }
}