<?php

namespace App\Models;

use App\Models\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','image','description','price','stock','category_id'];
    protected $hidden=['created_at','updated_at','pivot'];


    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

   public function restarunt(){
      return $this->belongsToMany(restaurant::class);
   }



}
