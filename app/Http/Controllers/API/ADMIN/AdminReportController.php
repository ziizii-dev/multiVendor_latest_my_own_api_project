<?php

namespace App\Http\Controllers\API\ADMIN;

use DateTime;
use App\Models\User;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdminPendingOrderResource;

class AdminReportController extends Controller
{
  //Search by date
  public function SearchByDate(Request $request){
    $date = new DateTime($request->date);
    $formatDate = $date->format('d F Y');
    $orders = Order::where('order_date',$formatDate)->latest()->get();
    $order = AdminPendingOrderResource::collection($orders);
    //return $order;
    return response()->json([
        "error"=>"false",
        "message"=>"Order by date",
        "data"=>$order,
        'total' =>$orders->count(),
    ]);


}// End Method
public function SearchByMonth(Request $request){
    $month = $request->month;
    $year = $request->year_name;
    $orders = Order::where('order_month',$month)
                  ->where('order_year',$year)
                  ->latest()
                  ->get();
$order = AdminPendingOrderResource::collection($orders);
                  return response()->json([
                    "error"=>"false",
                    "message"=>"Order by month",
                    "data"=>$order,
                    'total' =>$orders->count(),
                ]);

}// End Method
public function SearchByYear(Request $request){
    $year = $request->year;
    $orders = Order::where('order_year',$year)->latest()->get();
    $order = AdminPendingOrderResource::collection($orders);
    return response()->json([
        "error"=>"false",
        "message"=>"Order by user",
        "data"=>$order,
        'total' =>$orders->count(),
    ]);

}// End Method
public function OrderByUser(){
    $users = User::latest()->get();
    return response()->json([
        "error"=>"false",
        "message"=>"Order by year",
        "data"=>$users
    ]);

}// End Method
public function SearchByUser(Request $request){
     $users = $request->user;

    $orders = Order::where('user_id',$users)->latest()->get();
    $order = AdminPendingOrderResource::collection($orders);
    //return $orders;
    return response()->json([
        "error"=>"false",
        "message"=>"Order by User ",
        "data"=>$order,
        'total' =>$orders->count(),
    ]);
}// End Method

}
