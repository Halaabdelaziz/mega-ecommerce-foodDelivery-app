<?php 
namespace App\Http\Repositories;

use App\Models\restaurant;
use App\Models\res_Product;
use App\Http\Traits\ApiResponceTrait;
use App\Http\Resources\restaruntResource;
use App\Http\Interfaces\RestaruntInterface;

class RestaruntRepository implements RestaruntInterface{

    use ApiResponceTrait;
    private $restaurantModel;
    
    public function __construct(restaurant $restaurant )
    {
        $this->restaurantModel=$restaurant;   
    }
    public function index(){
        
        $Restarunts=$this->restaurantModel::select('id','name','image','description')->get();
        return $this->apiResponce(200,'All Restarunts',null,$Restarunts);
            
    }


    public function restaruntDetails($id){
         
         $Restarunts =   new restaruntResource($this->restaurantModel::with('products')->firstWhere('id',$id));
       

        return $this->apiResponce(200,'Restarunt details ',null,$Restarunts);

    }

} 