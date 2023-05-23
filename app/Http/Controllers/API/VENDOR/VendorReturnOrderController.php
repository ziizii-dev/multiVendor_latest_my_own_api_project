<?php

namespace App\Http\Controllers\API\VENDOR;

use App\Models\Order;
use App\Models\ShipState;
use App\Models\ShipDivision;
use Illuminate\Http\Request;
use App\Models\ShipDistricts;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdminPendingOrderResource;

class VendorReturnOrderController extends Controller
{
     public function VendorReturnOrder($vendor_id){
        $data =   $this->VendorOrder($vendor_id,'pending');
        return response()->json([
            "error"=>false,
            "message"=>"Vendor Pending Order List",
            "data"=>$data,
            "total"=>$data->count()
        ]);
    }//End method

    //////////////Private Functio for Vendor Order Get
private function VendorOrder($vendor_id,$status){
    $orderName = Request()->has('invoice_no') ? Request()->get('invoice_no') : '';
    $data = DB::table('order_items')
                      ->leftJoin('orders','order_items.order_id','orders.id')
                      ->leftJoin('products','order_items.product_id','products.id')
                      ->select('order_items.id','orders.*','products.product_thambnail','products.product_name','products.product_code','products.product_color'
                      ,'products.product_size','products.product_qty','products.selling_price')
                      ->where("order_items.vendor_id",$vendor_id)
                      ->where("orders.status",$status)
                      ->where(function ($query) use ($orderName) {
                if (isset($orderName)) {
            $query->where('invoice_no', 'LIKE', $orderName . '%');
           }
 return $query;
})->get();
//return $data;
$result = $data->map(function($item){
   return [
       "id"=>$item->id,
       "division"=>$this->searchDivision($item->division_id),
       "district"=>$this->searchDivision($item->district_id),
       "state"=>$this->searchDivision($item->state_id),
       "username"=>$item->name,
       "email"=>$item->email,
       "phone"=>$item->phone,
       "address"=>$item->adress,
       "postcode"=>$item->post_code,
       "payment_type"=>$item->payment_type,
       "payment_method"=>$item->payment_method,
       "transaction_id"=>$item->transaction_id,
       "currency"=>$item->currency,
       "amount"=>$item->amount,
       "order_number"=>$item->order_number,
       "invoice_no"=>$item->invoice_no,
       "order_date"=>$item->order_date,
       "status"=>$item->status,
       "product_thambnail"=>$item->product_thambnail,
       "product_name"=>$item->product_name,
       "product_code"=>$item->product_code,
       "product_color"=>$item->product_color,
       "product_size"=>$item->product_size,
       "product_qty"=>$item->product_qty,
       "selling_price"=>$item->selling_price,
   ];
   });
return $result;
//  return response()->json([
//    "error"=>false,
//    "message"=>"Vendor Pending Orders",
//    "data"=>$result,
//    "total"=>$result->count()
//  ]);
   }//End method

   private function searchDivision($id){
    $division = ShipDivision::find($id);
    return $division->division_name;
}
private function searchDistrict($id){
    $district = ShipDistricts::find($id);
    return $district->district_name;
}
private function searchState($id){
    $state = ShipState::find($id);
    return $state->state_name;
}
//////Vendor Request approve
public function VendorReturnRequestApproved($order_id){
    $data = Order::where('id',$order_id)->update(['return_order' => 2]);
    return response()->json([
     "error"=>"false",
     "message"=>"Return Order Approve Successfully",
     //"data"=>$data,
    ]);
 } // End Method

 ///Vendor complete order
 public function VendorCompleteReturnRequest($vendor_id){

    $data =   $this->VendorOrderComplete($vendor_id,'2');
    return response()->json([
        "error"=>false,
        "message"=>"Vendor Complete Return  Order List",
        "data"=>$data,
        "total"=>$data->count()
    ]);
} // End Method

private function VendorOrderComplete($vendor_id,$return_order){
    $orderName = Request()->has('invoice_no') ? Request()->get('invoice_no') : '';
    $data = DB::table('order_items')
                      ->leftJoin('orders','order_items.order_id','orders.id')
                      ->leftJoin('products','order_items.product_id','products.id')
                      ->select('order_items.id','orders.*','products.product_thambnail','products.product_name','products.product_code','products.product_color'
                      ,'products.product_size','products.product_qty','products.selling_price')
                      ->where("order_items.vendor_id",$vendor_id)
                      ->where("orders.return_order",$return_order)
                      ->where(function ($query) use ($orderName) {
                if (isset($orderName)) {
            $query->where('invoice_no', 'LIKE', $orderName . '%');
           }
 return $query;
})->get();
//return $data;
$result = $data->map(function($item){
   return [
       "id"=>$item->id,
       "division"=>$this->searchDivision($item->division_id),
       "district"=>$this->searchDivision($item->district_id),
       "state"=>$this->searchDivision($item->state_id),
       "username"=>$item->name,
       "email"=>$item->email,
       "phone"=>$item->phone,
       "address"=>$item->adress,
       "postcode"=>$item->post_code,
       "payment_type"=>$item->payment_type,
       "payment_method"=>$item->payment_method,
       "transaction_id"=>$item->transaction_id,
       "currency"=>$item->currency,
       "amount"=>$item->amount,
       "order_number"=>$item->order_number,
       "invoice_no"=>$item->invoice_no,
       "order_date"=>$item->order_date,
       "status"=>$item->status,
       "return_order"=>$item->return_order,
       "product_thambnail"=>$item->product_thambnail,
       "product_name"=>$item->product_name,
       "product_code"=>$item->product_code,
       "product_color"=>$item->product_color,
       "product_size"=>$item->product_size,
       "product_qty"=>$item->product_qty,
       "selling_price"=>$item->selling_price,
   ];
   });
return $result;
//  return response()->json([
//    "error"=>false,
//    "message"=>"Vendor Pending Orders",
//    "data"=>$result,
//    "total"=>$result->count()
//  ]);
   }//End method

}
