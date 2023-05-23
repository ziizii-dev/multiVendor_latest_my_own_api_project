<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VendorOrderResource extends JsonResource
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
            "color"=>$this->color,
            "size"=>$this->size,
            "qty"=>$this->qty,
            "price"=>$this->price,
           // "order_date"=>$this->order->order_date,
          // "order_month"=>$this->order->order_month,
           // "order_year"=>$this->order->order_year,
            "order_invoice"=>$this->order->invoice_no,
           // "order_amount"=>$this->order->amount,
            "order_payment_method"=>$this->order->payment_method,
            "order_status"=>$this->order->status,
            "product"=>$this->product->product_name,
            "vendor"=>$this->vendor->name,
        ];
    }
}
