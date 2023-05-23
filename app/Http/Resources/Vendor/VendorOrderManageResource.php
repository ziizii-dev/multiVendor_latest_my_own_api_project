<?php

namespace App\Http\Resources\Vendor;

use App\Models\User;
use App\Models\Order;
use App\Models\ShipState;
use App\Models\ShipDivision;
use App\Models\ShipDistricts;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorOrderManageResource extends JsonResource
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

            "division"=>$this->searchDivision($this->division_id),
            "district"=>$this->searchDistrict($this->district_id),
            "state"=>$this->searchState($this->state_id),
            "username"=>$this->name,
            "email"=>$this->email,
            "phone"=>$this->phone,
            "address,"=>$this->adress,
            "post_code"=>$this->post_code,
            "payment_type,"=>$this->payment_type,
            "payment_method"=>$this->payment_method,
            "transaction_id,"=>$this->transaction_id,
            "currency"=>$this->currency,
            "amount"=>$this->amount,
            "order_number,"=>$this->order_number,
            "invoice_no,"=>$this->invoice_no,
            "order_date"=>$this->order_date,
            "status"=>$this->status,




        ];
    }

    public function searchDivision($id){
        $division = ShipDivision::find($id);
        return $division->division_name;
    }
    // public function searchUser($id){
    //     $user = User::find($id);
    //     return [
    //         'name' =>$user->name,
    //         'email'=>$user->email,
    //         "phone"=>$user->phone,
    //         'address'=>$user->address
    //     ];
    // }
    // public function searchOrder($id){
    //     $order = Order::find($id);
    //     return [
    //         "name"=>$order->name
    //     ];
    // }
    public function searchDistrict($id){
        $district = ShipDistricts::find($id);
        return $district->district_name;
    }
    public function searchState($id){
        $state = ShipState::find($id);
        return $state->state_name;
    }
}
