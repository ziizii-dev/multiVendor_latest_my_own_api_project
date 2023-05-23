<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
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
            "category_id"=>$this->category->id,
            "category"=>$this->category->category_name,
            "subcategory_name"=>$this->subcategory_name,
            "subcategory_slug"=>$this->subcategory_slug,
        ];
    }
}
