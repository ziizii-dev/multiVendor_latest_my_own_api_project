<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            "name"=>$this->product_name,
            "product_slug"=>$this->product_slug,
            "product_code"=>$this->product_code,
            "product_qty"=>$this->product_qty,
            "product_tags"=>explode(',',$this->product_tags),
            "product_size"=>explode(',',$this->product_size),
            "product_color"=>explode(',',$this->product_color),
            "selling_price"=>$this->selling_price,
            "discount_price"=>$this->discount_price,
            "short_descp"=>$this->short_descp,
            "long_descp"=>$this->long_descp,
            "product_thambnail"=>$this->product_thambnail,
            "hot_deals"=>$this->hot_deals,
            "featured"=>$this->featured,
            "special_offer"=>$this->special_offer,
            "special_deals"=>$this->special_deals,
            "status"=>$this->status,
            "vendor_id"=>$this->vendorone->id,
            "brand_id"=>$this->brand->id,
            "category_id"=>$this->category->id,
            "subcategory_id"=>$this->subcategory->id,
            "vendor"=>$this->vendorone->name,
            "brand"=>$this->brand->brand_name,
            "category"=>$this->category->category_name,
            "subcategory"=>$this->subcategory->subcategory_name,

        ];
    }

}
