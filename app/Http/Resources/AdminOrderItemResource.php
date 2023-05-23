<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminOrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            "id"=>$this->id,
            "order"=>$this->order->name,
            "product"=>$this->product->product_name,
            "color"=>$this->color,
            "size"=>$this->size,
            "qty"=>$this->qty,
            "price"=>$this->price
        ];
    }
}
