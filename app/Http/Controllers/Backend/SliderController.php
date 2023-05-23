<?php

namespace App\Http\Controllers\Backend;

use Image;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
     // all category
     public function allSlider(){
        $sliders = Slider::where('status',1)->latest()->get();
        return view('backend.slider.slider_all',compact('sliders'));
}//End Method
//add slider
public function addSlider(){
    return view('backend.slider.slider_add');
}//End Method
//Store Brand
public function storeSlider(Request $request){
    $this->addSliderValidationCheck($request);
         $image = $request->file('slider_image');
         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(2376,807)->save('upload/slider/'.$name_gen);
         $save_url = 'upload/slider/'.$name_gen;
         Slider::insert([
            'slider_title'=>$request->slider_title,
            'short_title'=>$request->short_title,
            'slider_image'=>$save_url,

         ]);
         $notification = array(
            'message'=>"Slider inserted Successfully",
            'alert-type'=>'success'
        );
        return redirect()->route('all#slider')->with($notification);
}//End Method

//Edit slider
public function editSlider($id){
    $sliders = Slider::findOrFail($id);
    return view('backend.slider.slider_edit',compact('sliders'));
}//End Method
// Update brand
public function updateSlider(Request $request){
    $this->addSliderValidationCheck($request);
       $slider_id = $request->id;
       $old_img =$request->old_img;
    //    dd($old_img);
       if($request->file('slider_image')){
             $image = $request->file('slider_image');
             $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(120,120)->save('upload/slider/'.$name_gen);
             $save_url = 'upload/slider/'.$name_gen;
             if(file_exists($old_img)){
                unlink($old_img);
             }

             Slider::findOrFail($slider_id)->update([
                'slider_title'=>$request->slider_title,
                'short_title'=>$request->short_title,
                'slider_image'=>$save_url,
             ]);
             $notification = array(
                'message'=>"Slider Updated Successfully",
                'alert-type'=>'success'
            );
            return redirect()->route('all#slider')->with($notification);
        } else{
            Slider::findOrFail($slider_id)->update([
                'slider_title'=>$request->slider_title,
                'short_title'=>$request->short_title,

             ]);
             $notification = array(
                'message'=>"Slider Updated Without Image Successfully",
                'alert-type'=>'success'
            );
            return redirect()->route('all#slider')->with($notification);
        }
} //End Method
//Delete Slider
public function deleteSlider($id){
    $sliders = Slider::find($id);

    $img = $sliders->slider_image;
    // unlink($img);
   if(isset($sliders)){
       $sliders->status=0;
       $notification = array(
           'message'=>"Slider Deleted Successfully",
           'alert-type'=>'success'
       );
       if($sliders->save()){
           return redirect()->back()->with($notification);
       }

   }
}//End Method

//Validation
private function addSliderValidationCheck($request){
    Validator::make($request->all(),[
        'slider_title'=>'required',
        'short_title'=>'required',
        'slide_image'=>'mimes:jpeg,jpg,png,webp,gif'

    ])->Validate();
 }//End Method

}
