<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $fillable=['product_id','user_id','count'];
    protected $hidden =['created_at','updated_at'];


    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
   
}
