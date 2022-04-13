<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['name','img','adress','phone'];
    protected $hidden=['created_at','updated_at','pivot'];


   public function products(){
       return $this->belongsToMany(Product::class);
   }
 
}
