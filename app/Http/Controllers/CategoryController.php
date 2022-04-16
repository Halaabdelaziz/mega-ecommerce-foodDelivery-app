<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Interfaces\CategoryInterface;

class CategoryController extends Controller
{
    
    protected $CategoryInterface;
        
    public function __construct(CategoryInterface $CategoryInterface)
    {
            $this->CategoryInterface=$CategoryInterface;
    }
    
    public function index(){
        
            return $this->CategoryInterface->index();
            }
  
}
