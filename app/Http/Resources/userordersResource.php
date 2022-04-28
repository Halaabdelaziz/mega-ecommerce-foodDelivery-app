<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class userordersResource extends JsonResource
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
             'restarunt'=>$this->products->restarunt,
        ];
    }
}
