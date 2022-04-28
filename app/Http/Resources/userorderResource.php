<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class userorderResource extends JsonResource
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
             'order'=>$this->order,
             'status'=>$this->status,
             'products'=>$this->products,
              'count'=>$this->count,
              'net_price'=>$this->net_price,
              'unit_price'=>$this->unit_price
                    ];
    }
}
