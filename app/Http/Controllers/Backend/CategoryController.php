<?php

namespace App\Http\Controllers\Backend;

use Image;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    // all category
    public function allCategory(){
        $categories = Category::where('status',1)->latest()->get();
        return view('backend.category.category_all',compact('categories'));
}//End Method
 //Add Category
 public function addCategory(){
    return view ('backend.category.category_add');
}//End Method
//Store Brand
public function storeCategory(Request $request){
    $this->addCategoryValidationCheck($request);
         $image = $request->file('category_image');
         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(120,120)->save('upload/category/'.$name_gen);
         $save_url = 'upload/category/'.$name_gen;
         Category::insert([
            'category_name'=>$request->category_name,
            'category_slug'=>strtolower(str_replace(' ','-',$request->category_name)),
            'category_image'=>$save_url,

         ]);
         $notification = array(
            'message'=>"Category inserted Successfully",
            'alert-type'=>'success'
        );
        return redirect()->route('all#category')->with($notification);
}//End Method

  //Edit brnd
  public function editCategory($id){
    $category = Category::findOrFail($id);
    return view('backend.category.category_edit',compact('category'));
}//End Method
// Update brand
public function updateCategory(Request $request){
    $this->addCategoryValidationCheck($request);
       $category_id = $request->id;
       $old_img =$request->old_image;
    //    dd($old_img);
       if($request->file('category_image')){
             $image = $request->file('category_image');
             $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(120,120)->save('upload/category/'.$name_gen);
             $save_url = 'upload/category/'.$name_gen;
             if(file_exists($old_img)){
                unlink($old_img);
             }

             Category::findOrFail($category_id)->update([
                'category_name'=>$request->category_name,
                'category_slug'=>strtolower(str_replace(' ','-',$request->category_name)),
                'category_image'=>$save_url,

             ]);
             $notification = array(
                'message'=>"Category Updated Successfully",
                'alert-type'=>'success'
            );
            return redirect()->route('all#category')->with($notification);
        } else{
            Category::findOrFail($category_id)->update([
                'category_name'=>$request->category_name,
                'category_slug'=>strtolower(str_replace(' ','-',$request->category_name)),
                // 'category_image'=>$save_url,

             ]);
             $notification = array(
                'message'=>"Category Updated Without Image Successfully",
                'alert-type'=>'success'
            );
            return redirect()->route('all#category')->with($notification);
        }
} //End Method
//Delete Category
public function deleteCategory($id){
    $category = Category::find($id);

    $img = $category->category_image;
    // unlink($img);
   if(isset($category)){
       $category->status=0;
       $notification = array(
           'message'=>"Deleted Successfully",
           'alert-type'=>'success'
       );
       if($category->save()){
           return redirect()->back()->with($notification);
       }

   }
}//End Method



//Validation
private function addCategoryValidationCheck($request){
    Validator::make($request->all(),[
        'category_name'=>'required',
        'category_image'=>'mimes:jpeg,jpg,png,webp,gif'

    ])->Validate();
 }
}
