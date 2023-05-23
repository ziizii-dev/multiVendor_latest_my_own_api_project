<?php

namespace App\Http\Controllers\Backend;

use Image;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class CouponController extends Controller
{
    //all coupon
    public function allCoupon(){
        $coupon = Coupon::where('delete_status',1)->latest()->get();
        return view('backend.coupon.coupon_all',compact('coupon'));
    }//end method

    //Add coupon
    public function addCoupon(){
          return view("backend.coupon.coupon_add");
    }//End method

    ///Store coupon
    public function storeCoupon(Request $request){
        // return $request;
        $this->couponValidationCkeck($request);

             Coupon::insert([
                'coupon_name'=>$request->coupon_name,
                'coupon_discount'=>$request->coupon_discount,
                'coupon_validity'=>$request->coupon_validity,
                "created_at"=>Carbon::now()


             ]);
             $notification = array(
                'message'=>"Coupon inserted Successfully",
                'alert-type'=>'success'
            );
            return redirect()->route('all#coupon')->with($notification);
    }//End Method

//Edit coupon

public function editCoupon($id){
    // $coupons= Coupon::where('status',1)->orderBy('coupon_name',"ASC")->get();
    $coupon = Coupon::findOrfail($id);
    return view('backend.coupon.coupon_edit',compact('coupon'));
}//End Method

//Update coupon

public function updateCoupon(Request $request){
    $coupon_id = $request->id;
    // return $coupon_id;
    $this->couponValidationCkeck($request);

Coupon::findOrFail($coupon_id)->update([
//    'coupon_id'=>$request->coupon_id,
   'coupon_name'=>$request->coupon_name,
   'coupon_discount'=>$request->coupon_discount,
   'coupon_validity'=>$request->coupon_validity

]);
$notification = array(
   'message'=>"Coupon Updated Successfully",
   'alert-type'=>'success'
);
return redirect()->route('all#coupon')->with($notification);
}//End Method

           //Delete subcategory
public function deleteCoupon($id){
    $coupon = coupon::findOrFail($id);
    // dd($coupon->toArray());

   if(isset($coupon)){
       $coupon->delete_status=0;
       $notification = array(
           'message'=>" Coupon Deleted Successfully",
           'alert-type'=>'success'
       );
       if($coupon->save()){
           return redirect()->back()->with($notification);
       }

   }
}//End method

    //Coupon validation
    private function couponValidationCkeck($request){
        Validator::make($request->all(),[
            'coupon_name'=>'required|string',
            'coupon_discount'=>'required|integer',
            'coupon_validity'=>"required"
        ])->Validate();
    }
}
