<?php

namespace App\Http\Controllers\Backend;
use Image;
use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    // all subcategory
    public function allSubCategory(){
        $subcategories = SubCategory::where('status',1)->latest()->get();
        return view('backend.subcategory.subcategory_all',compact('subcategories'));
}//End Method
//Add Category
public function addSubCategory(){
    $categories= Category::orderBy('category_name',"ASC")->get();
    return view ('backend.subcategory.subcategory_add',compact('categories'));
}//End Method
public function storeSubCategory(Request $request){
    // return $request;
    $this->SubCategoryValidationCheck($request);

         SubCategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            'subcategory_slug'=>strtolower(str_replace(' ','-',$request->subcategory_name)),

         ]);
         $notification = array(
            'message'=>"Subcategory inserted Successfully",
            'alert-type'=>'success'
        );
        return redirect()->route('all#subcategory')->with($notification);
}//End Method

//Edit subcategory

public function editSubCategory($id){
    $categories= Category::where('status',1)->orderBy('category_name',"ASC")->get();
    $subcategory = SubCategory::findOrfail($id);
    return view('backend.subcategory.subcategory_edit',compact('categories','subcategory'));
}//End Method

//update subcategory
public function updateSubCategory(Request $request){
             $subcattegory_id = $request->id;
             $this->SubCategoryValidationCheck($request);

         SubCategory::findOrFail($subcattegory_id)->update([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            'subcategory_slug'=>strtolower(str_replace(' ','-',$request->subcategory_name)),

         ]);
         $notification = array(
            'message'=>"Subcategory Updated Successfully",
            'alert-type'=>'success'
        );
        return redirect()->route('all#subcategory')->with($notification);
}//End Method
//Delete subcategory
public function deleteSubCategory($id){
    $subcategory = SubCategory::findOrFail($id);
    // dd($subcategory->toArray());

   if(isset($subcategory)){
       $subcategory->status=0;
       $notification = array(
           'message'=>"Deleted Successfully",
           'alert-type'=>'success'
       );
       if($subcategory->save()){
           return redirect()->back()->with($notification);
       }

   }
}//End Method

//get subcategory data form ajax
public function getSubCategory($category_id){
    // dd($category_id);
$subcat = SubCategory::where('status',1)->where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
// dd($subcat);
return json_encode($subcat);
}//End method
//Validation
private function SubCategoryValidationCheck($request){
    Validator::make($request->all(),[
        'category_id'=>'required',
        'subcategory_name'=>'required',


    ])->Validate();
 }
}
