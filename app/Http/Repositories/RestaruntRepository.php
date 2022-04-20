<?php 
namespace App\Http\Repositories;

use App\Models\restaurant;
use App\Http\Interfaces\RestaruntInterface;
use App\Http\Traits\ApiResponceTrait;
use App\Models\res_Product;

class RestaruntRepository implements RestaruntInterface{

    use ApiResponceTrait;
    private $restaurantModel;
    
    public function __construct(restaurant $restaurant )
    {
        $this->restaurantModel=$restaurant;   
    }
    public function index(){
        
        $Restarunts=$this->restaurantModel::select('id','name','imageUrl','description')->get();
        return $this->apiResponce(200,'All Restarunts',null,$Restarunts);
            
    }

    public function restaruntDetails($id){
        
        $Restarunts = $this->restaurantModel::where('id',$id)->with('products:id,name,description,price')->get();
        return $this->apiResponce(200,'Restarunt details ',null,$Restarunts);

    }

} 