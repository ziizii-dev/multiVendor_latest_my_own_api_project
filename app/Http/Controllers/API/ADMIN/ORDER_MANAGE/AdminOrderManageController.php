<?php

namespace App\Http\Controllers\API\ADMIN\ORDER_MANAGE;

use Auth;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Resources\AdminOrderItemResource;
use App\Http\Resources\AdminPendingOrderResource;
class AdminOrderManageController extends Controller
{
/////////////
   public function PendingOrder(){
    $orderName = Request()->has('invoice_no') ? Request()->get('invoice_no') : '';
    $orders = Order::where('delete_status',1)
                       ->where('status','pending')
                       ->orderBy('id','DESC')
                       ->where(function ($query) use ($orderName) {
                 if (isset($orderName)) {
             $query->where('invoice_no', 'LIKE', $orderName . '%');
            }
  return $query;
})->get();
$order = AdminPendingOrderResource::collection($orders);
//return $order;

return response()->json([
  'data' => $order,
  'message' => 'Pending Order list.',
  'total' => $orders->count(),
 // 'page' => (int)$page,
 // 'rowPerPages' => (int)$limit,
]);
} // End Method

//Admin order details
public function AdminOrderDetails($order_id){
    $order = Order::with('division','district','state','user')
                    ->where('id',$order_id)
                    ->first();
                    //return $order;
     $orders = new AdminPendingOrderResource($order);
     //return $orders;
    $orderItem = OrderItem::with('product','vendor')
                            ->where('order_id',$order_id)
                            ->orderBy('id','DESC')
                            ->get();
       $orderItems = AdminOrderItemResource::collection($orderItem);
      // return $orderItems;

    return response()->json([
        "error"=>"false",
        "message"=>"Oder Details",
        "oeder_data"=>$orders,
        "order_item_data"=>$orderItems
    ]);


}// End Method
////////
//Confirm orders
public function AdminConfirmedOrder(){
    $orderName = Request()->has('invoice_no') ? Request()->get('invoice_no') : '';
    $orders = Order::where('delete_status',1)
                       ->where('status','confirm')
                       ->orderBy('id','DESC')
                       ->where(function ($query) use ($orderName) {
                 if (isset($orderName)) {
             $query->where('invoice_no', 'LIKE', $orderName . '%');

            }
  return $query;
})->get();
$order = AdminPendingOrderResource::collection($orders);
//return $order;

return response()->json([
  'data' => $order,
  'message' => 'Confirm Order list.',
  'total' => $orders->count(),
 // 'page' => (int)$page,
 // 'rowPerPages' => (int)$limit,
]);
} // End Method
//Processing orders
public function AdminProcessingOrder(){
    $orderName = Request()->has('invoice_no') ? Request()->get('invoice_no') : '';
    $orders = Order::where('delete_status',1)
                       ->where('status','processing')
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
  'message' => 'Processing Order list.',
  'total' => $orders->count(),
 // 'page' => (int)$page,
 // 'rowPerPages' => (int)$limit,
]);
} // End Method
//Delivered orders
public function AdminDeliveredOrder(){
    $orderName = Request()->has('invoice_no') ? Request()->get('invoice_no') : '';
    $orders = Order::where('delete_status',1)
                       ->where('status','deliverd')
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
  'message' => 'Delivered Order list.',
  'total' => $orders->count(),
 // 'page' => (int)$page,
 // 'rowPerPages' => (int)$limit,
]);
} // End Method

//Pending to Confirm
public function PendingToConfirm(Request $request, $order_id){
   $data = Order::findOrFail($order_id)->update(['status' => 'confirm']);
   return response()->json([
    "error"=>"false",
    "message"=>"Order Confirmed Succssfully",
    "data"=>$data
   ]);
}// End Method
//Confirm to processing
public function ConfirmToProcess($order_id){
    $data = Order::findOrFail($order_id)->update(['status' => 'processing']);
    return response()->json([
     "error"=>"false",
     "message"=>"Order Processing Succssfully",
     "data"=>$data
    ]);
}// End Method
//Process to Delivered
public function ProcessToDelivered($order_id){
    $product = OrderItem::where('order_id',$order_id)->get();
foreach($product as $item){
    Product::where('id',$item->product_id)
            ->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
}
   $data = Order::findOrFail($order_id)->update(['status' => 'deliverd']);
    return response()->json([
        "error"=>"false",
        "message"=>"Order Delivered Succssfully",
        "data"=>$data
       ]);

}// End Method

//Invoice Download
public function AdminInvoiceDownload($order_id){
    $order = Order::with('division','district','state','user')
                   ->where('id',$order_id)
                   ->first();
    $orderItem = OrderItem::with('product')
                           ->where('order_id',$order_id)
                           ->orderBy('id','DESC')
                           ->get();
    $pdf = Pdf::loadView('backend.orders.admin_order_invoice', compact('order','orderItem'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
    ]);
    return $pdf->download('invoice.pdf');

}// End Method
}
