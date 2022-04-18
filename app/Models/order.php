<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable= ['user_id','totalprice','delivery_fee'];
    protected $hidden =['created_at','updated_at'];
    public function products(){
        return $this->belongsToMany(product::class);
    }
}
