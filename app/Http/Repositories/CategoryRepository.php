<?php 
namespace App\Http\Repositories;

use App\Models\Category;
use App\Http\Traits\ApiResponceTrait;
use App\Http\Interfaces\CategoryInterface;

class CategoryRepositories implements CategoryInterface{
  use ApiResponceTrait;
    
      
    private $categoryModel;
    
    public function __construct(Category $Category )
    {
     $this->categoryModel=$Category;   
    }
    
    public function index(){
        
        $categories=$this->categoryModel::get();
        return $this->apiResponce(200,'All categories',null,$categories);
            
    }
}