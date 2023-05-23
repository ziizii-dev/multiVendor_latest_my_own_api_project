<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Compare;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class CompareController extends Controller
{
      //add Compare
      public function addToCompare(Request $request, $product_id){

        if (Auth::check()) {
      $exists = Compare::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if (!$exists) {
                Compare::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'created_at' => Carbon::now(),

               ]);
               return response()->json(['success' => 'Successfully Added On Your Compare' ]);
            } else{
                return response()->json(['error' => 'This Product Has Already on Your Compare' ]);

            }

        }else{
            return response()->json(['error' => 'At First Login Your Account' ]);
        }

    } // End Method

    //All compare view
    public function allCompare(){
        return view('frontend.compare.view_compare');
    }//End method

     //all compare porduct
     public function getCompareProduct(){
        $compare = Compare::with('product')->where('user_id',Auth::id())->latest()->get();
        // $wishQty = Compare::count();
        return response()->json([
           "compare"=>$compare,
        //    "wishQty"=>$wishQty,

        ]);
}//End Method
 //Compare remove
 public function compareRemove($id){

    Compare::where('user_id',Auth::id())->where('id',$id)->delete();
 return response()->json(['success' => 'Successfully Compare Product Remove' ]);
}// End Method
}
