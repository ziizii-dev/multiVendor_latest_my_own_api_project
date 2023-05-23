<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Image;

class BrandController extends Controller
{
    // all brand
    public function allBrand(){
              $brands = Brand::where('status',1)->latest()->get();
              return view('backend.brand.brand_all',compact('brands'));
    }//End Method
    //Add brand
    public function addBrand(){
        return view ('backend.brand.brand_add');
    }//End Method
    //Store Brand
    public function storeBrand(Request $request){
        $this->addBrandValidationCheck($request);
             $image = $request->file('brand_image');
             $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
             $save_url = 'upload/brand/'.$name_gen;
             Brand::insert([
                'brand_name'=>$request->brand_name,
                'brand_slug'=>strtolower(str_replace(' ','-',$request->brand_name)),
                'brand_image'=>$save_url,

             ]);
             $notification = array(
                'message'=>"Brand inserted Successfully",
                'alert-type'=>'success'
            );
            return redirect()->route('all#brand')->with($notification);
    }//End Method

    //Edit brnd
    public function editBrand($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit',compact('brand'));
    }
// Update brand
public function updateBrand(Request $request){
    $this->addBrandValidationCheck($request);
       $brand_id = $request->id;
       $old_img =$request->old_image;
       if($request->file('brand_image')){
             $image = $request->file('brand_image');
             $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
             $save_url = 'upload/brand/'.$name_gen;
             if(file_exists($old_img)){
                unlink($old_img);
             }
             Brand::findOrFail($brand_id)->update([
                'brand_name'=>$request->brand_name,
                'brand_slug'=>strtolower(str_replace(' ','-',$request->brand_name)),
                'brand_image'=>$save_url,

             ]);
             $notification = array(
                'message'=>"Brand Updated Successfully",
                'alert-type'=>'success'
            );
            return redirect()->route('all#brand')->with($notification);
        } else{
            Brand::findOrFail($brand_id)->update([
                'brand_name'=>$request->brand_name,
                'brand_slug'=>strtolower(str_replace(' ','-',$request->brand_name)),
                // 'brand_image'=>$save_url,

             ]);
             $notification = array(
                'message'=>"Brand Updated Without Image Successfully",
                'alert-type'=>'success'
            );
            return redirect()->route('all#brand')->with($notification);
        }
} //End Method
//Delete brand
public function deleteBrand($id){
    $brand = Brand::find($id);
    // dd($brand);
    $img = $brand->brand_image;
    unlink($img);
   if(isset($brand)){
       $brand->status=0;
       $notification = array(
           'message'=>"Deleted Successfully",
           'alert-type'=>'success'
       );
       if($brand->save()){
           return redirect()->back()->with($notification);
       }

   }
}//End Method
    //Validation
    private function addBrandValidationCheck($request){
        Validator::make($request->all(),[
            'brand_name'=>'required',
            'brand_image'=>'mimes:jpeg,jpg,png,webp,gif'

        ])->Validate();
     }

}
