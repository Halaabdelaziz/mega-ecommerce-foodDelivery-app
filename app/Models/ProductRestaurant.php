<?php

namespace App\Models;

use App\Models\Product;
use App\Models\restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductRestaurant extends Model
{
    use HasFactory;
    public $table = "product_restaurant";
    protected $fillable = ['restaurant_id','product_id'];
}
