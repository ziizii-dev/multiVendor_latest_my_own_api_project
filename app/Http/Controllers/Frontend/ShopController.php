<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function ShopPage(){
      //$products = Product::where('delete_status',1)->get();
      $products = Product::query();
       //return $products;
        if(!empty($_GET['category'])){
            $slugs = explode(',',$_GET['category']);
            $catIds = Category::select('id')
                               ->whereIn('category_slug',$slugs)
                               ->where('status',1)
                               ->pluck('id')
                               ->toArray();

       $products =$products->where('delete_status',1)->whereIn('category_id', $catIds)->get();
      // return $products;
        }
        elseif(!empty($_GET['brand'])){
            $slugs = explode(',',$_GET['brand']);
            $brandIds = Brand::select('id')
                               ->whereIn('brand_slug',$slugs)
                               ->where('status',1)
                               ->pluck('id')
                               ->toArray();

       $products =$products->where('delete_status',1)->whereIn('brand_id', $brandIds)->get();
      // return $products;
        }
        else{
            $products = Product::where('delete_status',1)
            ->where('status',1)
            ->orderBy('id','DESC')->get();
        }

$categories = Category::where('status',1)->orderBy('category_name','ASC')->get();
$brands = Brand::where('status',1)->orderBy('brand_name','ASC')->get();
//$breadcat = Category::where('id',$id)->where('status',1)->first();
$newProducts = Product::where('delete_status',1)->orderBy('id','DESC')->limit(3)->get();
return view ('frontend.product.shop_page',compact('products','categories','newProducts','brands'));
    }//End method


    //Shop filter
    public function ShopFilter(Request $request){
     $data = $request->all();
//return $data;
     $catUrl="";
     if (!empty($data['category'])) {
        foreach ($data['category'] as $category) {
            if (empty($catUrl)) {
                $catUrl .= '&category='.$category;
             }else{
               $catUrl .= ','.$category;
             }
        }
     }
     //return $catUrl;
     //Filter for Brand
     $brandUrl="";
     if (!empty($data['brand'])) {
        foreach ($data['brand'] as $brand) {
            if (empty($brandUrl)) {
                $brandUrl .= '&brand='.$brand;
             }else{
               $brandUrl .= ','.$brand;
             }
        }
     }
     return redirect()->route('shop.page',$catUrl.$brandUrl);
    }//end method
}
