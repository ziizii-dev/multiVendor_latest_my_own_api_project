<?php

namespace App\Http\Controllers\API\VENDOR;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\VendorOrderResource;

class VendorDashboardController extends Controller
{
    public $sum,$monthTotal,$yearTotal,$dateTotal;
    public function vendorDeshboard($vendor_id){
        $date = date('d-m-y');
        $month = date('F');
        $year = date('Y');
        $data = DB::table('order_items')
                    ->leftJoin('orders','order_items.order_id','orders.id')
                    ->leftJoin('products','order_items.product_id','products.id')
                    ->leftJoin('vendors','order_items.vendor_id','vendors.id')
                    ->select('order_items.id','orders.order_date','orders.invoice_no','orders.amount','orders.payment_method','orders.status')
                    ->where("order_items.vendor_id",$vendor_id)
                    ->where("orders.status","pending")
                    ->get();
                  // return $data;
//For Monthly Sale
         $totalM = DB::table('order_items')
                   ->leftJoin('orders','order_items.order_id','orders.id')
                   ->where("order_items.vendor_id",$vendor_id)
                   ->where('orders.order_month',$month)
                   ->get();
        $resultM = $totalM->map(function($item){
            return [
                "amount"=>$item->amount
            ];
        });
        foreach($resultM as $re){
            $this->monthTotal += $re['amount'];
        }
        //For Yearly Sale
     $totalone = DB::table('order_items')
        ->leftJoin('orders','order_items.order_id','orders.id')
        ->where("order_items.vendor_id",$vendor_id)
       ->where('orders.order_year',$year)
        ->get();
       // return $total;
$resultone = $totalone->map(function($item){
return [
    "amountYear"=>$item->amount
];
});
    foreach($resultone as $re){
    $this->yearTotal += $re['amountYear'];
}
//For Today Sale
$totaltwo = DB::table('order_items')
->leftJoin('orders','order_items.order_id','orders.id')
->where("order_items.vendor_id",$vendor_id)
->where('orders.order_date',$date)
->get();
// return $total;
         $resulttwo = $totaltwo->map(function($item){
        return [
     "amountDate"=>$item->amount
];
});
foreach($resulttwo as $re){
$this->dateTotal += $re['amountDate'];
}

       return response()->json([
        "error"=>"false",
        "message"=>"Vendor Dashboard Data",
        "monthly_Sale"=>$this->monthTotal,
        "yearly_Sale"=>$this->yearTotal,
        "today_Sale"=>$this->dateTotal,
        "data"=>$data,
        "total"=>$data->count()
       ]);

    }
}
