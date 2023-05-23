<?php

namespace App\Http\Controllers\Backend;

use Image;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
   // all banner
   public function allBanner(){
    $banners = Banner::where('status',1)->latest()->get();
    return view('backend.banner.banner_all',compact('banners'));
}//End Method
//add slider
public function addBanner(){
    return view('backend.banner.banner_add');
}//End Method
//Store Brand
public function storeBanner(Request $request){
    $this->addBannerValidationCheck($request);
         $image = $request->file('banner_image');
         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(768,450)->save('upload/banner/'.$name_gen);
         $save_url = 'upload/banner/'.$name_gen;
         Banner::insert([
            'banner_title'=>$request->banner_title,
            'banner_url'=>$request->banner_url,
            'banner_image'=>$save_url,

         ]);
         $notification = array(
            'message'=>"Banner inserted Successfully",
            'alert-type'=>'info'
        );
        return redirect()->route('all#banner')->with($notification);
}//End Method
//Edit banner
public function editBanner($id){
    $banners = Banner::findOrFail($id);
    return view('backend.banner.banner_edit',compact('banners'));
}//End Method

// Update brand
public function updateBanner(Request $request){
    $this->addBannerValidationCheck($request);
       $banner_id = $request->id;
       $old_img =$request->old_img;
    //    dd($old_img);
       if($request->file('banner_image')){
             $image = $request->file('banner_image');
             $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(786,450)->save('upload/banner/'.$name_gen);
             $save_url = 'upload/banner/'.$name_gen;
             if(file_exists($old_img)){
                unlink($old_img);
             }

             Banner::findOrFail($banner_id)->update([
                'banner_title'=>$request->banner_title,
                'banner_url'=>$request->banner_url,
                'banner_image'=>$save_url,
             ]);
             $notification = array(
                'message'=>"Banner Updated Successfully",
                'alert-type'=>'success'
            );
            return redirect()->route('all#banner')->with($notification);
        } else{
            Banner::findOrFail($banner_id)->update([
                'banner_title'=>$request->banner_title,
                'banner_url'=>$request->banner_url,

             ]);
             $notification = array(
                'message'=>"Banner Updated Without Image Successfully",
                'alert-type'=>'success'
            );
            return redirect()->route('all#banner')->with($notification);
        }
} //End Method
//Delete Slider
public function deleteBanner($id){
    $banners = Banner::find($id);

    $img = $banners->banner_image;
    // unlink($img);
   if(isset($banners)){
       $banners->status=0;
       $notification = array(
           'message'=>"Banner Deleted Successfully",
           'alert-type'=>'success'
       );
       if($banners->save()){
           return redirect()->back()->with($notification);
       }

   }
}//End Method

//Validation
private function addBannerValidationCheck($request){
    Validator::make($request->all(),[
        'banner_title'=>'required',
        'banner_url'=>'required',
        'banner_image'=>'mimes:jpeg,jpg,png,webp,gif'

    ])->Validate();
 }//End Method
}
