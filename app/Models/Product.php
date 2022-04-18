<?php

namespace App\Models;

use App\Models\restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','imageUrl','description','price','stock','category_id'];
    protected $hidden=['created_at','updated_at','pivot'];

   public function restarunt(){
       return $this->belongsToMany(restaurant::class);
   }
   public function categories(){
    return $this->belongsTo(Category::class,'category_id','id');
   }
   
}
