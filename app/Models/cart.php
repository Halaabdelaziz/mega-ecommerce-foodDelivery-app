<?php

namespace App\Models;

use App\Models\restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cart extends Model
{
    use HasFactory;
    protected $fillable=['product_id','user_id','count','restaurant_id'];
    protected $hidden =['created_at','updated_at'];


    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function restaurants(){
        return $this->belongsTo(restaurant::class,'restaurant_id','id');
    }
   
}
