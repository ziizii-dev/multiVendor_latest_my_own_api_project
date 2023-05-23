<?php

namespace App\Http\Controllers\API\ADMIN;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Cookie;


class AdminRegisteredController extends Controller
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

    $data = Admin::create($validated);
   // return $data;
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
        $admin = Admin::where('email', $validated['email'])->first();
       // return $admin;
        if (!$admin || !Hash::check($validated['password'], $admin->password)) {
            return Response([
                'error' => true,
                'message' => 'Username or Password is incorrect.'
            ], 401);
        } else {
            $admin->last_login = new \DateTime();
            $admin->auth_token = uniqid(base64_encode(Str::random(21)));
            //$admin->token_expired_at  = (string) Carbon::createFromFormat('Y-m-d H:i:s', $validated['expired_date']);
            $admin->save();

            return response()->json([
                "error"=>"false",
                "message"=>"Login success",
                "data"=>$admin
            ]);
        }
      }//End method

      //For logout page
      public function logout(Request $request)
      {
        $validated = $request->validate([
            'admin_id'=>'required',

        ]);

          Admin::where("id", $validated['admin_id'])->update(['auth_token' => null, 'token_expired_at' => null]);

          return response()->json([
              'error' => false,
              'authorize' => true,
              'message' => 'Admin logout Successfully!',
          ]);
      }//End method

      //For user lists
    public function user(){
        $user = Admin::get();
        return response()->json([
            "error"=>false,
            "message"=>"Admin User list",
            "data"=>$user,
        ]);
      }//End method

}
