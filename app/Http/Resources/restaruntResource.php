<?php

namespace App\Http\Resources;

use App\Http\Resources\productResource;
use Illuminate\Http\Resources\Json\JsonResource;

class restaruntResource extends JsonResource
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
            'image'=>$this->image,
            'name'=>$this->name,
            'description'=>$this->description,
            'address'=>$this->address,
            'phone'=>$this->phone,
            'products'=>  productResource::collection($this->products),
        ];
    }
}
