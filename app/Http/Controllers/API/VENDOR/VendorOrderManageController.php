<?php

namespace App\Http\Controllers\API\VENDOR;

use App\Models\User;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\OrderItem;
use App\Models\ShipState;
use App\Models\ShipDivision;
use Illuminate\Http\Request;
use App\Models\ShipDistricts;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdminPendingOrderResource;
use App\Http\Resources\Vendor\VendorOrderManageResource;
class VendorOrderManageController extends Controller
{
     //Vendor pending orders
    public function VendorPendingOrder($vendor_id){
        $data =   $this->VendorOrder($vendor_id,'pending');
        return response()->json([
            "error"=>false,
            "message"=>"Pending Order List",
            "data"=>$data,
            "total"=>$data->count()
        ]);
    }//End method
 //Vendor Confirm orders
    public function  VendorConfirmOrder($vendor_id){
        $data =   $this->VendorOrder($vendor_id,'confirm');
        return response()->json([
            "error"=>false,
            "message"=>"Confirm Order List",
            "data"=>$data,
            "total"=>$data->count()
        ]);
    }//End method
    //Vendor Procesing Order
    public function VendorProcessingOrder($vendor_id){
        $data =   $this->VendorOrder($vendor_id,'processing');

        return response()->json([
            "error"=>false,
            "message"=>"Processing Order List",
            "data"=>$data,
            "total"=>$data->count()
        ]);
    }//End mehod
    //Vendor Deliverd Order
    public function VendorDeliveredOrder($vendor_id){
        $data =   $this->VendorOrder($vendor_id,'deliverd');
        return response()->json([
            "error"=>false,
            "message"=>"Deliver Order List",
            "data"=>$data,
            "total"=>$data->count()
        ]);

    }//End method

           //Vendor Pending Detail

           public function VendorPendingDetail( $vendor_id,$order_id){

           $data =  $this->VendorOrderDetail($vendor_id,$order_id,'pending');
           return response()->json([
            "error"=>false,
            "message"=>"Pending Order Details",
            "data"=>$data
           ]);
           }//End method
           public function VendorPendingToConfirmOrder(Request $request){
           $data =  $this->VendorOrderChange($request,'confirm');
             return response()->json([
              "error"=>"false",
              "message"=>"Pending Order Changed To Confirm Successfully",
             "data"=>true
       ]);
           }//End method
           //VendorConfirmOrderToProcessing
           public function VendorConfirmOrderToProcessing(Request $request){
            $data =  $this->VendorOrderChange($request,'processing');
            return response()->json([
             "error"=>"false",
             "message"=>"Confirm Order Changed To Processing Successfully",
            "data"=>true
      ]);
           }//End method
          //// VendorProcessingOrderToDeliverd
          public function VendorProcessingOrderToDeliverd(Request $request){
            $data =  $this->VendorOrderChange($request,'deliverd');
            return response()->json([
             "error"=>"false",
             "message"=>"Processing Order Changed To Deliver Successfully",
            "data"=>true
      ]);
           }//End method
 //Change Pending to Confirm
  //Vendor Confirm Detail
  public function VendorConfirmDetail( $vendor_id,$order_id){

    $data =  $this->VendorOrderDetail($vendor_id,$order_id,'confirm');
    return response()->json([
     "error"=>false,
     "message"=>"Confirm Order Details",
     "data"=>$data
    ]);
   }//End method
//Vendor Processing Detail
public function VendorProcessingDetail( $vendor_id,$order_id){
    $data =  $this->VendorOrderDetail($vendor_id,$order_id,'processing');
    return response()->json([
     "error"=>false,
     "message"=>"Processing Order Details",
     "data"=>$data
    ]);
   }//End method
//Deliver Detail
public function VendorDeliverdDetail( $vendor_id,$order_id){
    $data =  $this->VendorOrderDetail($vendor_id,$order_id,'deliverd');
    return response()->json([
     "error"=>false,
     "message"=>"Deliver Order Details",
     "data"=>$data
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
   //////////////Order Detail Private Functions
   private function VendorOrderDetail( $vendor_id,$order_id,$status){
    //return $order_id;
    $data = DB::table('order_items')
               ->leftJoin('vendors','vendors.id','order_items.vendor_id')
               ->leftJoin('orders','orders.id','order_items.order_id')
               ->select('orders.*','vendors.name','order_items.*')
               ->where([['orders.status',$status],
               ['vendor_id',$vendor_id],
               ['orders.id',$order_id]])
               //->orwhere('order_id',$order_id)
               ->first();
            return $data;
            //    return response()->json([
            //     "error"=>"false",
            //     "message"=>"Vendor Pending Order Details",
            //     "data"=>new VendorOrderManageResource($data),
            //    ]);
 }// End Method
 ////Private Vendor Order Change
 private function VendorOrderChange(Request $request,$status){
    $order = Order::find($request->id);
    $order->status = $status;
    $order->save();
    return $order;
    // return response()->json([
    //     "error"=>"false",
    //     "message"=>"Pending Order Changed To Confirm Successfully",
    //     "data"=>true
    //    ]);
}// End Method




}
