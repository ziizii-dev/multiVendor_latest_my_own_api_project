<?php

namespace App\Http\Controllers\User;
use Auth;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ShipState;
use App\Models\ShipDivision;
use Illuminate\Http\Request;
use App\Models\ShipDistricts;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;


class CheckoutController extends Controller
{
    //For Division
    public function DistrictGetAjax($division_id){

        $ship = ShipDistricts::where('delete_status',1)
                                ->where('division_id',$division_id)
                                ->orderBy('district_name','ASC')
                                ->get();
        return json_encode($ship);

    } // End Method
//For District
    public function StateGetAjax($district_id){

        $ship = ShipState::where('delete_status',1)
                          ->where('district_id',$district_id)
                          ->orderBy('state_name','ASC')
                          ->get();
        return json_encode($ship);

    }// End Method
    public function CheckoutStore(Request $request){
$this->checkoutValidationCheck($request);
        $data = [];
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;

        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['shipping_address'] = $request->shipping_address;
        $data['notes'] = $request->notes;
        $cartTotal = Cart::total();

        if ($request->payment_option == 'stripe') {
           return view('frontend.payment.stripe',compact('data','cartTotal'));
        }elseif ($request->payment_option == 'card'){
            return 'Card Page';
        }else{
            return view('frontend.payment.cash',compact('data','cartTotal'));
        }


    }// End Method
    private function checkoutValidationCheck($request){

        Validator::make($request->all(),[
            'shipping_name'=>'required',
            'shipping_email'=>'required',
            'shipping_phone'=>'required',
            'post_code'=>'required',




        ])->Validate();
     }
}
