<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminReviewResource extends JsonResource
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
            "id"=>$this->id,
            "product_image"=>$this->product->product_thambnail,
            "product"=>$this->product->product_name,
            "user"=>$this->user->name,
            "vendor"=>$this->vendor->name,
            "comment"=>$this->comment,
            "rating"=>$this->rating,
            "status"=>$this->status

        ];
    }

}
