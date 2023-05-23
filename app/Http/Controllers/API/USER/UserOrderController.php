<?php

namespace App\Http\Controllers\API\USER;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\AdminOrderItemResource;
use App\Http\Resources\AdminPendingOrderResource;

class UserOrderController extends Controller
{
    public function UserOrderPage(Request $request,$user_id){
       //return $user_id;
        $orders = Order::with('user','division','district','state')
                        ->where('user_id',$user_id)->orderBy('id','DESC')->get();
         $order = AdminPendingOrderResource::collection($orders);
       // return $order;

         return response()->json([
            "error"=>"false",
            "message"=>"User Order Products",
            "data"=>$order,
            "total"=>$order->count()
         ]);

       }// End Method
       public function UserOrderDetails($order_id){
        $order = Order::with('division','district','state','user')
                        ->where('id',$order_id)
                        ->first();
      $orders = new AdminPendingOrderResource($order);
                        //return $orders;
     $orderItem = OrderItem::with('product')
                                 ->where('order_id',$order_id)
                                 ->orderBy('id','DESC')
                                 ->get();
               $orderItems = AdminOrderItemResource::collection($orderItem);
              // return $orderItems;

              return response()->json([
                "error"=>"false",
                "message"=>"User Order Detail",
                "order_data"=>$orders,
                "orderItem_data"=>$orderItems
              ]);

    }// End Method
//     public function UserOrderInvoice($order_id){

//         $order = Order::with('division','district','state','user')
//                         ->where('id',$order_id)
//                         ->first();
//      $orders = new AdminPendingOrderResource($order);
//                     // return $orders;
//         $orderItem = OrderItem::with('product')
//                                ->where('order_id',$order_id)
//                                ->orderBy('id','DESC')
//                                ->get();
//   $orderItems = AdminOrderItemResource::collection($orderItem);
//                             // return $orderItems;

//         $pdf = Pdf::loadView('frontend.order.order_invoice',
//         compact('orders','orderItems'))->setPaper('a4')->setOption([
//                 'tempDir' => public_path(),
//                 'chroot' => public_path(),
//         ]);
//         return $pdf->download('invoice.pdf');

//     }// End Method

public function ReturnOrder(Request $request,$order_id){
    $this->returnReasonValidationCheck($request);
   $data = Order::findOrFail($order_id)->update([
        'return_date' => Carbon::now()->format('d F Y'),
        'return_reason' => $request->return_reason,
        'return_order' => 1,
    ]);
//return $data;

return response()->json([
    "error"=>"false",
    "message"=>"Return Request Send Successfully",
    "data"=>$data
]);
}// End Method
public function ReturnOrderPage($user_id){
   // $userId = User::findOrFail(id);
    $orders = Order::with('division','district','state','user')
                    -> where('user_id',$user_id)
                    ->where('return_reason','!=',NULL)
                    ->orderBy('id','DESC')
                    ->get();
     $order = AdminPendingOrderResource::collection($orders);
            //return $order;
            return response()->json([
                "error"=>"false",
                "message"=>"User Order Products With Return Reasons",
                "data"=>$order,
                "total"=>$order->count()
             ]);


}// End Method

public function OrderTracking(Request $request){
    // $this->codeValidationCkeck($request);
    $invoice = $request->code;
    $track = Order::where('invoice_no',$invoice)->first();
    //return $track;

    if ($track) {

     return response()->json([
        "error"=>"false",
        "message"=>"Your order tracking",
        "tracking_data"=>$track->status
     ]);


    }if($invoice == NULL){
        return response()->json([
            "error"=>"true",
            "message"=>'Invoice Code is required!',

         ]);

    }else{
        return response()->json([
            "error"=>"true",
            "message"=> 'Invoice Code is Invalid',

         ]);
    }

}// End Method
private function returnReasonValidationCheck($request){
    Validator::make($request->all(),[
        'return_reason'=>'required',
    ])->Validate();
}//End method
}
