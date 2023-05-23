<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //Dashboard
    public function userDashboard(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('index',compact('userData'));
    }//End method
    //Admin profile store

    public function userProfileStore(Request $request){
        $this->profileValidationCheck($request);
       $data = User::where('id',Auth::user()->id)->first();
       $data ->name = $request->name;
       $data ->username = $request->username;
       $data ->email = $request->email;
       $data ->phone = $request->phone;
       $data ->address = $request->address;
       if($request->file('photo')){
           $file = $request->file('photo');
           @unlink(public_path('upload/user_images/'.$data->photo));
           $fileName = uniqid(). $request->file('photo')->getClientOriginalName();
           // dd ($fileName);
           $file->move(public_path('upload/user_images'),$fileName);
           $data['photo']=$fileName;
       }
       $data->save();
       // dd($data->toArray());
       $notification = array(
           'message'=>"User Profile Updated Successfully",
           'alert-type'=>'success'
       );
       return redirect()->back()->with($notification);

         }//End Method
         public function userLogout(Request $request)
         {
             Auth::guard('web')->logout();

             $request->session()->invalidate();

             $request->session()->regenerateToken();
             $notification = array(
                'message'=>"User Logout Successfully",
                'alert-type'=>'success'
            );

             return redirect('/login')->with($notification);
         }//End Method

         //Password Update
         public function updatePassword(Request $request){
            $this->passwordValidationCheck($request);
            $hasedPassword = Auth::user()->password;
            if(!Hash::check($request->oldPassword, auth::user()->password)){
                return back()->with('error',"Old Password Doesn't Match!");
            }
            User::whereId(auth()->user()->id)->update([
                'password'=>Hash::make($request->newPassword)
            ]);
            return back()->with('status',"Password Changed Successfully");

        } //End

         //Validation
         private function profileValidationCheck($request){
            Validator::make($request->all(),[
                'name'=>'required',
                'username'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'address'=>'required',
                'photo'=>'mimes:jpeg,jpg,png,webp,gif'

            ])->Validate();
         }
          //Password Validation
          private function passwordValidationCheck($request){
            Validator::make($request->all(),[
                'oldPassword'=>'required',
                'newPassword'=>'required',
                'confirmPassword'=>'required|same:newPassword',

            ])->Validate();
         }
}
