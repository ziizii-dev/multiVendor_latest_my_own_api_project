<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShipStateResource extends JsonResource
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
            "division_id"=>$this->division->id,
            "district_id"=>$this->district->id,
            "division"=>$this->division->division_name,
            "district"=>$this->district->district_name,
            "state_name"=>$this->state_name,
        ];
    }
}
