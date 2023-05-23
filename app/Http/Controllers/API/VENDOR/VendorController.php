<?php

namespace App\Http\Controllers\API\VENDOR;

use Image;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\FileOperations\AdminProfileOperation;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $vendorData = User::where('id',Auth::user($id))->first();
    //     return $vendorData;
    //     return view('vendor.vendor_profile_view',compact('vendorData'));
    // }
    public function vendorDetail($id){
       // return $id;
       $data = Vendor::findOrFail($id);
      //return $data;
        if(isset($data)){
            return response()->json([
                "error"=>false,
                "message"=>"Vendor details",
                "data"=>$data
               ]);
        }else{
            return response()->json([
                "error"=>true,
                "message"=>"There is no vendor data",

               ]);
        }

    }//End method

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

     //Profile update
    public function update(Request $request,$id)
    {
        //return "hello";
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
           'address'=>'required',
            'photo'=>'nullable',
         ]);
         if ($validator->fails()) {
            return response()->json([
               'message'=>'validations fails',
               'errors' =>$validator->errors()
            ],422);
         }
         if($request->photo == null){
           // $image =  $request->photo;
         $data= Vendor::findOrFail($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'vendor_join'=>$request->vendor_join,
            'vendor_short_info'=>$request->vendor_short_info,
            //'photo'=>$image,
         ]);
         //return $data;
         return response()->json([
            "error"=>false,
            "message"=>"Profile Updated Without Image Successfully",
            "data"=>$data
           ]);
        }else{
            $image =  $request->photo;
            $operation = new AdminProfileOperation( $request->photo,$request->name,'vendor_images');
            $url = $operation->storeImage();
           $data= Vendor::findOrFail($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'vendor_join'=>$request->vendor_join,
            'vendor_short_info'=>$request->vendor_short_info,
            'photo'=>$url,

         ]);
         //return $data;
         return response()->json([
            "error"=>false,
            "message"=>"Profile Updated With Image Successfully",
            "data"=>$data
           ]);

        }

}//End method
public function vendorPasswordUpdate(Request $request)
{
   $validator=Validator::make($request->all(),[
      'old_password'  =>'required',
      'new_password'=>'required',
      'confirm_password' =>'required|same:new_password'
   ]);
   if ($validator->fails()) {
      return response()->json([
         'message'=>'validations fails',
         'errors' =>$validator->errors()
      ],422);
   }
   //$user=$request->user();
   $user =Vendor::where('id',$request->id)->first();
   // $user;
   // dd($user->password);
   if (Hash::check($request->old_password,$user->password)) {
      $user->update([
         'password'=>Hash::make($request->new_password)
      ]);
      return response()->json([
         'message'=>' password successfully updated',
         'errors' =>$validator->errors()
      ],200);
   }
   else
   {
      return response()->json([
         'message'=>'old password does not match',
         'errors' =>$validator->errors()
      ],422);
   }
}//End method
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Validation
    private function vendorprofileValidationCheck($request){
        Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
           'address'=>'required',
            'photo'=>'mimes:jpeg,jpg,png,webp,gif',
            // 'vendor_join'=>'required',
            // 'vendor_short_info'=>'required'

        ])->Validate();
     }//End
     //Password Validation
    //  private function passwordValidationCheck($request){
    //     Validator::make($request->all(),[
    //         'oldPassword'=>'required',
    //         'newPassword'=>'required',
    //         'confirmPassword'=>'required|same:newPassword',

    //     ])->Validate();
    //  }//End
}
