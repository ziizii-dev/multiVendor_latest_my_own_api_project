<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;

use App\Models\User;
use App\Models\Brand;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Wishlist;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class WishlistController extends Controller
{
    //add wishlist
    public function addToWishList(Request $request, $product_id){

        if (Auth::check()) {
      $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if (!$exists) {
               Wishlist::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'created_at' => Carbon::now(),
               ]);
               return response()->json(['success' => 'Successfully Added On Your Wishlist' ]);
            } else{
                return response()->json(['error' => 'This Product Has Already on Your Wishlist' ]);
            }
        }else{
            return response()->json(['error' => 'At First Login Your Account' ]);
        }
    } // End Method
    //User wishlist
    public function allWishList(){


        return view('frontend.wishlist.view_wishlist');
    }//End method
    //all wishlist porduct
    public function getWishlistProduct(){
                     $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
                    //  return $wishlist;
                     $wishQty = wishlist::count();
                     return response()->json([
                        "wishlist"=>$wishlist,
                        "wishQty"=>$wishQty,

                     ]);
    }//End Method
    //Wishlist remove
    public function wishlistRemove($id){
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
     return response()->json(['success' => 'Successfully Product Remove' ]);
    }// End Method
}
