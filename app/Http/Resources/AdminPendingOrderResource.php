<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminPendingOrderResource extends JsonResource
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
            "user"=>$this->user->name,
            "division"=>$this->division->division_name,
            "district"=>$this->district->district_name,
            "state"=>$this->state->state_name,
            "name"=>$this->name,
            "email"=>$this->email,
            "phone"=>$this->phone,
            "address"=>$this->address,
            "post_code"=>$this->post_code,
            "notes"=>$this->notes,
            "payment_type"=>$this->payment_type,
            "payment_method"=>$this->payment_method,
            "transaction_id"=>$this->transaction_id,
            "currency"=>$this->currency,
            "amount"=>$this->amount,
            "order_number"=>$this->order_number,
            "invoice_no"=>$this->invoice_no,
            "order_date"=>$this->order_date,
            "order_month"=>$this->order_month,
            "order_year"=>$this->order_year,
            "confirmed_date"=>$this->confirmed_date,
            "processing_date"=>$this->processing_date,
            "picked_date"=>$this->picked_date,
            "shipped_date"=>$this->shipped_date,
            "delivered_date"=>$this->delivered_date,
            "cancel_date"=>$this->cancel_date,
            "return_date"=>$this->return_date,
            "return_reason"=>$this->return_reason,
            "return_order"=>$this->return_order,
            "status"=>$this->status,

        ];
    }
}
