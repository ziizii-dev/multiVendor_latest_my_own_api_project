<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\OrderComplete;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\VendorRegNotification;
use Illuminate\Support\Facades\Notification;

class VendorController extends Controller
{
    //Vendor dashboard
    public function vendorDeshboard(){
        return view('vendor.index');
    }
    //Login
    public function vendorLogin(){
        return view('vendor.vendor_login');
     }//End

     //Logout
     public function vendorDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    }//End
      // Profile
      public function vendorProfile(){
        $id = Auth::user()->id;
        $vendorData = User::find($id);
        return view('vendor.vendor_profile_view',compact('vendorData'));
    }
    //Admin profile store

    public function vendorProfileStore(Request $request){
        $this->profileValidationCheck($request);
       $data = User::where('id',Auth::user()->id)->first();
       $data ->name = $request->name;
       $data ->email = $request->email;
       $data ->phone = $request->phone;
       $data ->address = $request->address;
       $data ->vendor_join = $request->vendor_join;
       $data ->vendor_short_info = $request->vendor_short_info;

       if($request->file('photo')){
           $file = $request->file('photo');
           @unlink(public_path('upload/vendor_images/'.$data->photo));
           $fileName = uniqid(). $request->file('photo')->getClientOriginalName();
           // dd ($fileName);
           $file->move(public_path('upload/vendor_images'),$fileName);
           $data['photo']=$fileName;
       }
       $data->save();
       // dd($data->toArray());
       $notification = array(
           'message'=>"Vendor Profile Updated Successfully",
           'alert-type'=>'success'
       );
       return redirect()->back()->with($notification);

         }//End

          //Password change
          public function vendorChangePassword(){

            return view('vendor.vendor_change_password');
          }//End

          //Update password
          public function updatePassword(Request $request){

            $this->passwordValidationCheck($request);

            $hasedPassword = Auth::user()->password;
            // dd($hasedPassword);
            // $dbHashValue = $user->password;
            if(Hash::check($request->oldPassword, $hasedPassword)){
                $users = User::find(Auth::id());
                $users->password = bcrypt($request->newPassword);
                $users->save();
                 $notification = array(
                    'message'=>"Password Updated Successfully",
                    'alert-type'=>'success'
                );

                return back()->with($notification);

            } else{
                $notification = array(
                    'message'=>"Password does't match",
                    'alert-type'=>'warning'
                );

                return back()->with($notification);
            }

        }



         //Validation
         private function profileValidationCheck($request){
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
         private function passwordValidationCheck($request){
            Validator::make($request->all(),[
                'oldPassword'=>'required',
                'newPassword'=>'required',
                'confirmPassword'=>'required|same:newPassword',

            ])->Validate();
         }//End

         //Become Vendor
         public function becomeVendor(){
                   return view('auth.become_vendor');
         }//End Method

  // Vendor Regiter
         public function vendorRegister(Request $request)
         {
            $vuser =User::where('role','admin')->get();
             $request->validate([
                 'name' => ['required', 'string', 'max:255'],
                 'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                 'password' => ['required', 'confirmed'],
             ]);

             $user = User::insert([
                 'name' => $request->name,
                 'username' => $request->username,
                 'email' => $request->email,
                 'phone' => $request->phone,
                 'vendor_join' => $request->vendor_join,
                 'password' => Hash::make($request->password),
                 'role' =>'vendor',
                 'status' => 'inactive',
             ]);
             $notification = array(
                'message'=>"Vendor Register Successfully",
                'alert-type'=>'success'
            );
            $data= Notification::send($vuser, new VendorRegNotification($request));
            return redirect()->route('vendor#login')->with($notification);

         }
}
