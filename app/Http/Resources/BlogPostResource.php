<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogPostResource extends JsonResource
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
            "blogcategory"=>$this->blogcategory->blog_category_name,
            "post_title"=>$this->post_title,
            "post_slug"=>$this->post_slug,
            "post_image"=>$this->post_image,
            "post_short_description"=>$this->post_short_description,
            "post_long_description"=>$this->post_long_description,
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_at,
        ];
    }
}
