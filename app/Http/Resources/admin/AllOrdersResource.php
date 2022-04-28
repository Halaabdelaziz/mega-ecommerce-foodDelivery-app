<?php

namespace App\Http\Resources\admin;

use App\Http\Resources\productResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AllOrdersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'address'=>$this->address,
            'phone'=>$this->phone,
            'product'=>new productResource($this->products),
            'count'=>$this->count,
            'unit_price'=>$this->unit_price,
            'net_price'=>$this->net_price,
            'order'=>$this->order,
            'status'=>$this->status
        ];
    }
}
