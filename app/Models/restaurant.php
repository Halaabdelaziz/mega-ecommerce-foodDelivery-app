<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductRestaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','address','phone','description'];
    protected $hidden=['created_at','updated_at','pivot'];


    public function products(){
       return $this->belongsToMany(Product::class);
    }
  
}
