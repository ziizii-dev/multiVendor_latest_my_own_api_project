<?php

namespace App\Http\Controllers\API\ADMIN;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdminPendingOrderResource;

class AdminReturnOrderController extends Controller
{
    public function ReturnRequest(){
        $orderName = Request()->has('invoice_no') ? Request()->get('invoice_no') : '';
        $orders = Order::where('delete_status',1)
                           ->where('return_order',1)
                           ->orderBy('id','DESC')
                           ->where(function ($query) use ($orderName) {
                     if (isset($orderName)) {
                 $query->where('invoice_no', 'LIKE', $orderName . '%');

                }
      return $query;
    })->get();
    $order = AdminPendingOrderResource::collection($orders);
   // return $order;

    return response()->json([
      'data' => $order,
      'message' => 'Return Order list.',
      'total' => $orders->count(),
     // 'page' => (int)$page,
     // 'rowPerPages' => (int)$limit,
    ]);
    } // End Method

    public function ReturnRequestApproved($order_id){
       $data = Order::where('id',$order_id)->update(['return_order' => 2]);
       return response()->json([
        "error"=>"false",
        "message"=>"Return Order Approve Successfully",
        //"data"=>$data,
       ]);
    } // End Method

    //Complete Return order
    public function CompleteReturnRequest(){
        $orderName = Request()->has('invoice_no') ? Request()->get('invoice_no') : '';
        $orders = Order::where('delete_status',1)
                           ->where('return_order',2)
                           ->orderBy('id','DESC')
                           ->where(function ($query) use ($orderName) {
                     if (isset($orderName)) {
                 $query->where('invoice_no', 'LIKE', $orderName . '%');

                }
      return $query;
    })->get();
    $order = AdminPendingOrderResource::collection($orders);
    return response()->json([
      'data' => $order,
      'message' => 'Return Order list.',
      'total' => $orders->count(),
     // 'page' => (int)$page,
     // 'rowPerPages' => (int)$limit,
    ]);
        // //////////////
        // $orders = Order::where('return_order',2)->orderBy('id','DESC')->get();
        // return response()->json([
        //     "error"=>"false",
        //     "message"=>"Complete Return Orders",
        //     "data"=>$orders,
        //    ]);

    } // End Method


}
