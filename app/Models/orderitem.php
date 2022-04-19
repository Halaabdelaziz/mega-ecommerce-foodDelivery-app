<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    use HasFactory;
    protected $fillable= ['order_id','product_id','count','unit_price','net_price','delivery_fee','adress','email'];
    protected $hidden =['created_at','updated_at'];
    public function order(){
        return $this->belongsTo(order::class,'order_id','id');
    } 
}
