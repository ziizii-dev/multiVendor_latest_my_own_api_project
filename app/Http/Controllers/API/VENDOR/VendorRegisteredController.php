<?php

namespace App\Http\Controllers\API\VENDOR;

use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Cookie;
class VendorRegisteredController extends Controller
{
    //Register page
 public function register(Request $request){
    $validated = $request->validate([
        'name'=>'required',
        'username'=>'required',
        'email'=>'required',
        'password'=> 'required',
        'password_confirmation'=>'same:password'
    ]);
    $validated['password'] = bcrypt($validated['password']);
    $validated["auth_token"] = uniqid(base64_encode(Str::random(21)));
    $validated["token_expired_at"]  = Carbon::now()->addWeeks(1);

    $data = Vendor::create($validated);
    return $data;
    return response()->json([
        "error"=>"false",
        "message"=>"create success",
        "data"=>$data
    ]);

    }//End method

     //For login page
     public function login(Request $request){
        //return $request;
        $validated = $request->validate([
            'email'=>'required',
            'password'=>'required',
            //'expired_date' => 'nullable'

        ]);
    $vendor = Vendor::where('email', $validated['email'])->first();
   // return $admin;
    if (!$vendor || !Hash::check($validated['password'], $vendor->password)) {
        return Response([
            'error' => true,
            'message' => 'Username or Password is incorrect.'
        ], 401);
    } else {
        $vendor->last_login = new \DateTime();
        $vendor->auth_token = uniqid(base64_encode(Str::random(21)));
        //$vendor->token_expired_at  = (string) Carbon::createFromFormat('Y-m-d H:i:s', $validated['expired_date']);
        $vendor->save();

        return response()->json([
            "error"=>"false",
            "message"=>"Login success",
            "data"=>$vendor
        ]);
    }
  }//End method

 //For logout page
 public function logout(Request $request)
 {
   // return "hello";
   $validated = $request->validate([
       'vendor_id'=>'required',
   ]);
     Vendor::where("id", $validated['vendor_id'])->update(['auth_token' => null, 'token_expired_at' => null]);

     return response()->json([
         'error' => false,
         'authorize' => true,
         'message' => 'Vendor logout Successfully!',
     ]);
 }//End method
 //For user lists
 public function user(){
    $vendor = Vendor::get();
    return response()->json([
        "error"=>false,
        "message"=>"Vendor User list",
        "data"=>$vendor,
    ]);
  }//End method


}
