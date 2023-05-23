<?php

namespace App\Http\Controllers\API\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couponName = Request()->has('coupon_name') ? Request()->get('coupon_name') : '';
        $coupons = Coupon::where('delete_status',1)
                         ->where(function ($query) use ($couponName) {
                  if (isset($couponName)) {
                       $query->where('coupon_name', 'LIKE', $couponName . '%');

                      }
            return $query;
        });
        return response()->json([
            'data' => $coupons->get(),
            'message' => 'Coupon list.',
            'total' => $coupons->count(),
           // 'page' => (int)$page,
           // 'rowPerPages' => (int)$limit,
        ]);
    }//End method

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $this->couponValidationCkeck($request);

        $data = Coupon::insert([
                'coupon_name'=>$request->coupon_name,
                'coupon_discount'=>$request->coupon_discount,
                'coupon_validity'=>$request->coupon_validity,
                "created_at"=>Carbon::now()
             ]);
             return response()->json([
                "error"=>false,
                "message"=>"Create Coupon Success.",
                "data"=>$data
               ]);
    }//End method

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // $coupon_id = $request->id;
    // return $coupon_id;
    $this->couponValidationCkeck($request);
$data = Coupon::findOrFail($id)->update([
//    'coupon_id'=>$request->coupon_id,
   'coupon_name'=>$request->coupon_name,
   'coupon_discount'=>$request->coupon_discount,
   'coupon_validity'=>$request->coupon_validity

       ]);
   return response()->json([
    "error"=>false,
    "message"=>" Coupon Updated Success.",
    "data"=>$data
   ]);
    }//End method

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = coupon::findOrFail($id);
   if(isset($coupon)){
       $coupon->delete_status=0;
       if($coupon->save()){
        return response()->json([
            "error"=>false,
            "message"=>" Coupon Deleted Success.",
            "data"=>$coupon
           ]);
       }

   }
    }
        //Coupon validation
        private function couponValidationCkeck($request){
            Validator::make($request->all(),[
                'coupon_name'=>'required|string',
                'coupon_discount'=>'required|integer',
                'coupon_validity'=>"required"

            ])->Validate();
        }//End method
}
