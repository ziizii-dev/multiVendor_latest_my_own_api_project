<?php

namespace App\Http\Controllers\API\USER;
use Image;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
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

    //User Detail
    public function userDetail($id){
       // return $id;
        $data = User::findOrFail($id);
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
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
           'address'=>'required',
            'photo'=>'mimes:jpeg,jpg,png,webp,gif',
         ]);
         if ($validator->fails()) {
            return response()->json([
               'message'=>'validations fails',
               'errors' =>$validator->errors()
            ],422);
         }
         if($request->file('photo')){
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(120,120)->save('upload/user_images/'.$name_gen);
            $save_url = 'upload/user_images/'.$name_gen;

            }
         $data= User::findOrFail($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'photo'=>$save_url,

         ]);
//return $data;
        return response()->json([
            "error"=>false,
            "message"=>"Profile Updated Success",
            "data"=>$data
           ]);
    }//End method
    //User Password Update
    public function userPasswordUpdate(Request $request)
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
       $user =User::where('id',$request->id)->first();
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

}
