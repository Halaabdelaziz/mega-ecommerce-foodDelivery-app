<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class productResource extends JsonResource
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
            'image'=>$this->image,
            'name'=>$this->name,
            'description'=>$this->description,
            'price'=>$this->price,
            'stock'=>$this->stock,
            'categoery'=>$this->category,
            'restarunt'=>$this->restarunt
            
        ];;
    }
}
