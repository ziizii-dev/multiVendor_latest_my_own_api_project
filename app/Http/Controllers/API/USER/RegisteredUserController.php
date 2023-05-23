<?php

namespace App\Http\Controllers\API\USER;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
 //Register page
 public function register(Request $request){

    $this->userRegisterValidationCheck($request);


    $user = User::create([
        'name' => $request->name,
        'username'=>$request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    return response()->json([
        "error"=>false,
        "message"=>"Registration Success.",
        "data"=>$user
    ]);
    }//End method
        //For login page
        public function login(Request $request){
            $this->userLoginValidationCheck($request);
            if(!Auth::attempt($request->only("email","password"))){
                return [
                    "message"=>"invalid"
                ];
            }
           $user = Auth::user();
        //    return $user;

        $token = $user->createToken('token')->plainTextToken;
          //return $token;
        $cookie = cookie("jwt",$token, 60*24);
        return response([
            "message"=>"success",
            "token"=>$token
        ])->withCookie($cookie);
        }//End method

    //For user detail
    public function user(){
        $user = User::get();
       //return $user;
        return response()->json([
            "error"=>false,
            "message"=>"User list",
            "data"=>$user,
        ]);
      }//End method
      //For Logout Page
      public function logout(){
        $cookie = Cookie::forget('jwt');
        return response()->json([
            "message"=>"logout success"
        ])->withCookie($cookie);
      }//End method

    private function userRegisterValidationCheck($request){
        Validator::make($request->all(),[
            'name'=>'required',
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
            'password_confirmation'=>'same:password'

        ])->Validate();

    }//End method

 //Validation
 private function userLoginValidationCheck($request){
    Validator::make($request->all(),[
        'email'=>'required',
        'password'=>'required',

    ])->Validate();
}//End method




}
