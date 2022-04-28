<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable= ['user_id','totalprice','delivery_fee'];

  

    public function orders(){
        return $this->hasMany(Order::class,'order_id','id');
    }
}
