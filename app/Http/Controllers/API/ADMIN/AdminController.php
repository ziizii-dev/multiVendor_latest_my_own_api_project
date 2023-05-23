<?php

namespace App\Http\Controllers\API\ADMIN;

use Image;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\FileOperations\AdminProfileOperation;

class AdminController extends Controller
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
    public function show($id)
    {
        //
    }

    //Admin Detail
    public function adminDetail($id){
        // return $id;
         $data = Admin::findOrFail($id);
        //return $data;
          if(isset($data)){
              return response()->json([
                  "error"=>false,
                  "message"=>"Admin details",
                  "data"=>$data
                 ]);
          }else{
              return response()->json([
                  "error"=>true,
                  "message"=>"There is no admin data",

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
    public function update(Request $request, $id)
    {
        //return $request;
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
        //$image =  $request->photo;
            $data= Admin::findOrFail($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                //'photo'=>$image,
             ]);
    //return $data;
            return response()->json([
                "error"=>false,
                "message"=>"Admin Profile Wihout Image Updated Success",
                "data"=>$data
               ]);
            }else{
                $operation = new AdminProfileOperation( $request->photo,$request->name,'admin_images');
          $url = $operation->storeImage();
                $data= Admin::findOrFail($id)->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'address'=>$request->address,
                    'photo'=>$url,
                 ]);
                    return response()->json([
                        "error"=>false,
                        "message"=>"Admin Profile With Image Updated Success",
                        "data"=>$data
                       ]);
                    }

    }//End method
    //Admin Password Update
    public function adminPasswordUpdate(Request $request)
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
       $user = Admin::where('id',$request->id)->first();
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

    ////////////////////////////////////////
         ////// Admin All Method //////////////
         public function AllAdmin(){
            $adminName = Request()->has('name') ? Request()->get('name'):"";
            $alladminuser = Admin::where('delete_status',1)->where(function($query) use ($adminName){
                if($adminName){
                    $query->where('name','LIKE',$adminName.'%');
                }
                return $query;
            })->latest()->get();

            // return $alladminuser;
            return response()->json([
                "error"=>false,
                "message"=>"All admin lists",
                "data"=>$alladminuser,
                "total"=>$alladminuser->count()
            ]);

        }// End Mehtod
    //Admin User Store
public function AdminUserStore(Request $request){
    // return $request;
    $this->adminUserStoreValidationCheck($request);
    $user = new Admin();
    $user->username = $request->username;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->password = Hash::make($request->password);
    $user->role = 'admin';
    // $user->status = 'active';
    $user->save();

    if ($request->roles) {
        $user->assignRole($request->roles);
    }

    return response()->json([
        "error"=>false,
        "message"=>"New Admin User Inserted Successfully",
        "data"=>$user

    ]);

}// End Mehtod
public function AdminUserUpdate(Request $request,$admin_id){
    // return $admin_id;
    $this->adminUserUpdateValidationCheck($request);
   $user = Admin::findOrFail($admin_id);
   $user->username = $request->username;
   $user->name = $request->name;
   $user->email = $request->email;
   $user->phone = $request->phone;
   $user->address = $request->address;
   $user->role = 'admin';
   $user->save();

return response()->json([
    "error"=>false,
    "message"=>" Admin User Updated Successfully",
    "data"=>$user

]);



}// End Mehtod
//Delete Admin Role
public function DeleteAdminRole($id){

    $user = Admin::findOrFail($id);
    if (isset($user)) {
        $user->delete_status=0;
        $notification = array(
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'success'
        );
        if($user->save()){
            return response()->json([
                "error"=>false,
                "message"=>" Admin User Deleted Successfully",
                "data"=>$user

            ]);
        }
    }
}// End Mehtod

// Validation
private function adminUserStoreValidationCheck($request){
    Validator::make($request->all(),[
        'username'=>'required',
        'name'=>'required',
        'email'=>'required',
        'phone'=>'required',
        'password'=>'required',
        'address'=>'required',
        'role'=>'required',



    ])->Validate();
 }//End
 //Password Validation Update Admin
 private function adminUserUpdateValidationCheck($request){
    Validator::make($request->all(),[
        'username'=>'required',
        'name'=>'required',
        'email'=>'required',
        'phone'=>'required',
        'address'=>'required',
        // 'role'=>'required',



    ])->Validate();
 }

}
