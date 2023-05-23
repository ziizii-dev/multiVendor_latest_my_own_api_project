<?php

namespace App\Http\Controllers\API\USER;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Brand;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use App\Models\ShipDivision;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class UserCartController extends Controller
{
    //Store add to cart
    public function addToCart(Request $request ,$id){
        $product = Product::with('brand','category','subcategory','vendorone')
                           ->where('delete_status',1)->findOrFail($id);
            $products = new ProductResource($product);
          // return $products;

        if ($product->discount_price == NULL) {

            $data =Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                    'vendor' => $request->vendor,
                ],
            ]);
            return $data;

   return response()->json(['success' => 'Successfully Added on Your Cart' ]);

        }else{
            //return "hello";

            $data = Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                    'vendor' => $request->vendor,
                ],
            ]);
            return $data;
   return response()->json(['success' => 'Successfully Added on Your Cart' ]);

        }

    }// End Method
}
