<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderitem extends Model
{
    use HasFactory;
    protected $fillable= ['order_id','product_id','count','unit_price','net_price','delivery_fee'];
}
