<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    //Show Index
    public function Index(){
        $skip_category_0 = Category::where('status',1)->skip(0)->first();
        //return $skip_category_0;
        // dd($skip_category_0 ->toArray());
        $skip_product_0 = Product::where('status',1)
                                 ->where('delete_status',1)
                                 ->where('category_id',$skip_category_0->id)
                                 ->orderBy('id','DESC')
                                 ->limit(5)->get();

         $skip_category_2= Category::where('status',1)->skip(2)->first();
         $skip_product_2= Product::where('status',1)
                                 ->where('delete_status',1)
                                 ->where('category_id',$skip_category_2->id)
                                 ->orderBy('id','DESC')
                                 ->limit(5)->get();

            $skip_category_1= Category::where('status',1)->skip(1)->first();
             $skip_product_1= Product::where('status',1)->where('status',1)
                                      ->where('delete_status',1)
                                      ->where('category_id',$skip_category_1->id)
                                     ->orderBy('id','DESC')
                                      ->limit(5)->get();
             $skip_category_3= Category::where('status',1)->skip(3)->first();
             $skip_product_3= Product::where('status',1)
                                      ->where('delete_status',1)
                                      ->where('category_id',$skip_category_3->id)
                                     ->orderBy('id','DESC')
                                      ->limit(5)->get();
             $skip_category_4= Category::where('status',1)->skip(4)->first();
             $skip_product_4= Product::where('status',1)
                                      ->where('delete_status',1)
                                      ->where('category_id',$skip_category_4->id)
                                     ->orderBy('id','DESC')
                                      ->limit(5)->get();
                 $hot_deals = Product::where('delete_status',1)
                                       ->where('hot_deals',1)
                                       ->where('discount_price','!=', NULL)
                                       ->orderBy('id','DESC')->limit(3)->get();
          $special_offers = Product::where('delete_status',1)
                                       ->where('special_offer',1)

                                       ->orderBy('id','DESC')->limit(3)->get();
            $special_deals = Product::where('delete_status',1)
                                       ->where('special_deals',1)

                                       ->orderBy('id','DESC')->limit(3)->get();
           $news = Product::where('delete_status',1)
                                       ->where('status',1)

                                       ->orderBy('id','DESC')->limit(3)->get();



        return view('frontend.index',compact('skip_category_0','skip_product_0',
        'skip_category_2','skip_product_2','skip_category_1','skip_product_1','skip_category_3','skip_product_3',
        'skip_category_4','skip_product_4','hot_deals','special_offers','special_deals','news'));


    }//End method

    //froent product details
    public function productDetails($id,$slug){
        $product = Product::where('delete_status',1)->findOrFail($id);
        $color = $product->product_color;
        $product_color = explode (',',$color);
        $size = $product->product_size;
        $product_size = explode (',',$size);
        $category = Category::where('status',1)->find($id);
        // return $category;
        $multiImage = MultiImg:: where('delete_status',1)->where('product_id',$id)->get();
        $cat_id = $product ->category_id;
        $relatedProduct = Product::where('delete_status',1)
                                  ->where('category_id',$cat_id)
                                   ->where('id','!=',$id)
                                   ->orderBy('id','DESC')
                                   ->limit(4)->get();
        return view('frontend.product.product_details',compact('product','product_color','product_size','multiImage','relatedProduct','category'));

    }//End method

     //Vendor Details
     public function vendorDetails($id) {
        $vendor = User::findOrFail($id);
        $vproduct = Product::where('vendor_id',$id)->where('delete_status',1)->get();
        return view('frontend.vendor.vendor_details',compact('vendor','vproduct'));
    }//End Method
    //Vendor All
    public function vendorAll(){
        $vendors =User::where('status','active')->where('role','vendor')->orderBy('id','DESC')->get();
        return view('frontend.vendor.vendor_all',compact('vendors'));
    }//End method
    //Product Category url
    public function catWiseProduct(Request $request, $id,$slug){

        $products = Product::where('delete_status',1)
                             ->where('status',1)
                             ->where('category_id',$id)
                             ->orderBy('id','DESC')->get();
        $categories = Category::where('status',1)->orderBy('category_name','ASC')->get();
        $breadcat = Category::where('id',$id)->where('status',1)->first();
        $newProducts = Product::where('delete_status',1)->orderBy('id','DESC')->limit(3)->get();
        return view ('frontend.product.category_view',compact('products','categories','breadcat','newProducts'));

    }//End Method
    public function subCatWiseProduct(Request $request, $id,$slug){
        $products = Product::where('delete_status',1)
                             ->where('status',1)
                             ->where('subcategory_id',$id)
                             ->orderBy('id','DESC')->get();
        $categories = Category::where('status',1)->orderBy('category_name','ASC')->get();
        $breadsubcat = SubCategory::where('status',1)->where('id',$id)->first();
        $newProducts = Product::where('delete_status',1)->orderBy('id','DESC')->limit(3)->get();
        return view ('frontend.product.subcategory_view',compact('products','categories','breadsubcat','newProducts'));

    }//End Method

    //product view ajax
    public function productViewAjax($id){
         $product = Product::where('delete_status',1)->with('category','brand')->findOrFail($id);
         $color = $product->product_color;
        $product_color = explode (',',$color);
        $size = $product->product_size;
        $product_size = explode (',',$size);

        return response()->json([
            'product'=>$product,
            'color'=>$product_color,
            'size'=>$product_size
        ]);
    }//End method

  //For Searching frontend section
  public function ProductSearch(Request $request){
    $request->validate(['search' => "required"]);
    $item = $request->search;
    $categories = Category::where('status',1)->orderBy('category_name','ASC')->get();
    $products = Product::where('product_name','LIKE',"%$item%")
                        ->where('delete_status',1)
                        ->get();
    $newProduct = Product::where('delete_status',1)->orderBy('id','DESC')->limit(3)->get();
    return view('frontend.product.search',compact('products','item','categories','newProduct'));

}// End Method

public function SearchProduct(Request $request){

    $request->validate(['search' => "required"]);

     $item = $request->search;
     $products = Product::where('product_name','LIKE',"%$item%")
                         ->select('product_name','product_slug','product_thambnail','selling_price','id')
                         ->limit(6)
                         ->get();

     return view('frontend.product.search_product',compact('products'));

  }// End Method




}
