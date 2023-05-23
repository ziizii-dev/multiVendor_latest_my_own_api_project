<?php

namespace App\Http\Controllers\API\ADMIN;

use App\Models\User;
use App\Models\Order;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdminPendingOrderResource;

class AdminDashboardController extends Controller
{
    public function adminDeshboard(){

        $date = date('d-m-y');
        $today = Order::where('order_date',$date)->sum('amount');
       // return $today;
        $month = date('F');
        $month =Order::where('order_month',$month)->sum('amount');
        //return $month;
        $year = date('Y');
        $year =Order::where('order_year',$year)->sum('amount');
       // return $year;
        $pending = Order::with("user","division","district","state")
                         ->where('status','pending')->limit(10)->get();
        $pendings =  AdminPendingOrderResource::collection($pending);
        //return $pendings;
        $vendor = Vendor::where('status','active')->where('role','vendor')->get();
        //return $vendor->count();
        $customer = User::where('status','active')->where('role','user')->get();
        //return $customer->count();

        return response()->json([
            "error"=>"false",
            "message"=>"Admin Dashboard Data",
            "today_sale_data"=>$today,
            "monthly_sale_data"=>$month,
            "yearly_sale_data"=>$year,
            "pending_order_data"=>$pendings,
            "pending_order_data_total"=>$pendings->count(),
            "active_vendors_data"=>$vendor->count(),
            "active_user_data"=>$customer->count()


        ]);

    }//End Method
}
