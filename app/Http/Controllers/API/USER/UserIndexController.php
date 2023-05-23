<?php

namespace App\Http\Controllers\API\USER;

use App\Models\User;
use App\Models\Brand;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ProductResource;
use App\Http\Resources\MultiImgResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\SubCategoryResource;


class UserIndexController extends Controller
{
     //Show Index
     public function Index(){
        $skip_category_0 = Category::where('status',1)->skip(0)->first();
       //return $skip_category_0;
        // dd($skip_category_0 ->toArray());
        $skip_product_0 = Product::with("brand",'category','subcategory','vendorone')
                                ->where('status',1)
                                 ->where('delete_status',1)
                                 ->where('category_id',$skip_category_0->id)

                                 ->orderBy('id','DESC')
                                 ->limit(5)->get();
           // return $skip_product_0;
            $product_0 = ProductResource::collection($skip_product_0);
            // $newProduct = $skip_product_0->map(function($item){
            //         // return [
            //         //     "id"=>$item->id,
            //         //     "pname"=>$item->product_name,
            //         //     "brand"=>$item->brand->brand_name,
            //         //     "category"=>$item->category->category_name
            //         // ];
            //         $item->brand_name = $item->brand->brand_name;
            //         $item->cateogry_name = $item->category->category_name;
            //         return $item;
            // });
            // return $newProduct;
            // foreach ($skip_product_0  as $product )
            // {{$product['category']['category_name']}}
            // endforeach


            // $new = $skip_category_0
            // return $skip_product_0;


         $skip_category_2= Category::where('status',1)->skip(2)->first();
         $skip_product_2= Product::with("brand",'category','subcategory','vendorone')
                                 ->where('status',1)
                                 ->where('delete_status',1)
                                 ->where('category_id',$skip_category_2->id)
                                 ->orderBy('id','DESC')
                                 ->limit(5)->get();
            $product_2 = ProductResource::collection($skip_product_2);
            //return $category_2;

            $skip_category_1= Category::where('status',1)->skip(1)->first();
             $skip_product_1= Product::with("brand",'category','subcategory','vendorone')
                                      ->where('status',1)->where('status',1)
                                      ->where('delete_status',1)
                                      ->where('category_id',$skip_category_1->id)
                                     ->orderBy('id','DESC')
                                      ->limit(5)->get();
            $product_1 = ProductResource::collection($skip_product_1);
            //return $category_1;


             $skip_category_3= Category::where('status',1)->skip(3)->first();
             $skip_product_3= Product::with("brand",'category','subcategory','vendorone')
                                      ->where('status',1)
                                      ->where('delete_status',1)
                                      ->where('category_id',$skip_category_3->id)
                                     ->orderBy('id','DESC')
                                      ->limit(5)->get();
           $product_3 = ProductResource::collection($skip_product_3);
          // return $category_3;

             $skip_category_4= Category::where('status',1)->skip(4)->first();

             $skip_product_4=Product::with("brand",'category','subcategory','vendorone')
                                      ->where('status',1)
                                      ->where('delete_status',1)
                                      ->where('category_id',$skip_category_4->id)
                                     ->orderBy('id','DESC')
                                      ->limit(5)->get();
             $product_4 = ProductResource::collection($skip_product_4);
                                     //return $category_4;

                 $hot_deals = Product::with("brand",'category','subcategory','vendorone')
                                       ->where('delete_status',1)
                                       ->where('hot_deals',1)
                                       ->where('discount_price','!=', NULL)
                                       ->orderBy('id','DESC')->limit(3)->get();
                $hot_deal = ProductResource::collection($hot_deals);
                         //return $hot_deal;
          $special_offers = Product::with("brand",'category','subcategory','vendorone')
                                       ->where('delete_status',1)
                                       ->where('special_offer',1)
                                       ->orderBy('id','DESC')->limit(3)->get();
                 $special_offer = ProductResource::collection($special_offers);
                                      // return $special_offer;
            $special_deals = Product::with("brand",'category','subcategory','vendorone')
                                       ->where('delete_status',1)
                                       ->where('special_deals',1)
                                       ->orderBy('id','DESC')->limit(3)->get();
             $special_deal = ProductResource::collection($special_deals);
                            // return $special_deal;

           $news = Product::with("brand",'category','subcategory','vendorone')
                                       ->where('delete_status',1)
                                       ->where('status',1)
                                       ->orderBy('id','DESC')->limit(3)->get();
             $new = ProductResource::collection($news);
                                       // return $new;

                 return response()->json([
                    "error"=>"false",
                    "message"=>"Product and Categories lists",
                    "category_0_data"=> $skip_category_0,
                    "product_0_data"=>$product_0,
                    "category_2_data"=>$skip_category_2,
                    "product_2_data"=>$product_2,
                    "category_1_data"=>$skip_category_1,
                    "product_1_data"=>$product_1,
                    "category_3_data"=>$skip_category_3,
                    "product_3_data"=>$product_3,
                    "category_4_data"=>$skip_category_4,
                    "product_4_data"=>$product_4,
                    "hot_deal"=>$hot_deal,
                    "special_offer"=>$special_offer,
                    "special_deal"=>$special_deal,
                    "new"=>$new,
                 ]);
    }//End method

    //froent product details
    public function productDetails($id,$slug){
        $products = Product::with("brand",'category','subcategory','vendor')
                           ->where('delete_status',1)->findOrFail($id);
//return $products;
        $product = new ProductResource($products);
       // return $product;
        $color = $product->product_color;
        $product_color = explode (',',$color);
        $size = $product->product_size;
        $product_size = explode (',',$size);
        $category = Category::where('status',1)->find($id);
        //return $category;
        $multiImage = MultiImg::
                             with("product")
                              ->
                               where('delete_status',1)
                               ->where('product_id',$id)
                               ->get();

           $multiImgs = MultiImgResource::collection($multiImage);
           //return $multiImgs;
        $cat_id = $product ->category_id;
        $relatedProduct = Product::with("brand",'category','subcategory','vendorone')
                                  ->where('delete_status',1)
                                  ->where('category_id',$cat_id)
                                   ->where('id','!=',$id)
                                   ->orderBy('id','DESC')
                                   ->limit(4)->get();
               $relatedProducts = ProductResource::collection($relatedProduct);

            return response()->json([
                                    "error"=>"false",
                                    "message"=>"Product and Categories lists",
                                    "product_data"=>$product,
                                    //"product_color"=>$product_color,
                                   // "product_size"=> $product_size,
                                    "product_image"=> $multiImgs,
                                    "product_related"=> $relatedProducts,
                                    "category_data"=>  $category

                                   ]);


        // return view('frontend.product.product_details',compact('product','product_color','product_size','multiImage','relatedProduct','category'));

    }//End method

     //Vendor Details
     public function vendorDetails($id) {
        $vendor = Vendor::findOrFail($id);
        //return $vendor;
        $vproducts = Product::with("brand",'category','subcategory','vendor')
                           ->where('vendor_id',$id)->where('delete_status',1)->get();
         $vproduct = ProductResource::collection($vproducts);
         //return $vproduct;

        return response()->json([
            "error"=>"false",
            "message"=>"Vendor Detail",
            "data"=>[
                $vendor,
                $vproduct
               ]
           ]);
        // return view('frontend.vendor.vendor_details',compact('vendor','vproduct'));
    }//End Method
    public function vendorAll(){
        $vendorName = Request()->has('name') ? Request()->get('name') : '';
        $vendors = Vendor::where('status','active')
                         ->orderBy('id','DESC')
                         ->where(function ($query) use ($vendorName) {
                  if (isset($vendorName)) {
                       $query->where('name', 'LIKE', $vendorName . '%');

                      }
            return $query;
        });

        return response()->json([
            'data' => $vendors ->get(),
            'message' => 'All Vendors',
            'total' => $vendors->count(),
           // 'page' => (int)$page,
           // 'rowPerPages' => (int)$limit,
        ]);


        // return view('frontend.vendor.vendor_all',compact('vendors'));
    }//End method
    public function catWiseProduct(Request $request, $id,$slug){

        $products = Product::with("brand",'category','subcategory','vendorone')
                             ->where('delete_status',1)
                             ->where('status',1)
                             ->where('category_id',$id)
                             ->orderBy('id','DESC')->get();

          $product= ProductResource::collection($products);
          //return $product;

        $categories = Category::where('status',1)->orderBy('category_name','ASC')->get();
        //return $categories;
        $breadcat = Category::where('id',$id)->where('status',1)->first();
        //return $breadcat;
        $newProducts = Product::with("brand",'category','subcategory','vendorone')
                                 ->where('delete_status',1)
                                 ->orderBy('id','DESC')
                                 ->limit(3)->get();
                 $newProduct= ProductResource::collection($newProducts);
       // return $newProduct;
       return response()->json([
        'message' => 'Casewise Products',
        'product_data'=>$product,
        'category_data'=>$categories,
        'breadcat_data'=>$breadcat,
        'newProduct_data'=>$newProduct,
        'total' => $products->count(),
       // 'page' => (int)$page,
       // 'rowPerPages' => (int)$limit,
    ]);
    }//End Method
    //product view ajax
    public function productViewAjax($id){
        $product = Product::with("brand",'category','subcategory','vendorone')
                           ->where('delete_status',1)
                           ->findOrFail($id);
        $color = $product->product_color;
       $product_color = explode (',',$color);
       $size = $product->product_size;
       $product_size = explode (',',$size);
       $products = new ProductResource($product);
       //return $products;
       return response()->json([
           'product'=>$products,
           'color'=>$product_color,
           'size'=>$product_size
       ]);
   }//End method

   //For Searching frontend section
  public function ProductSearch(Request $request){
    $request->validate(['search' => "required"]);
    $item = $request->search;
    $categories = Category::where('status',1)->orderBy('category_name','ASC')->get();
    //return  $categories;
    $products = Product::with("brand",'category','subcategory','vendorone')
                        ->where('product_name','LIKE',"%$item%")
                        ->where('delete_status',1)
                        ->get();
 $product= ProductResource::collection($products);
                       // return $product;
    $newProduct = Product::with("brand",'category','subcategory','vendorone')
                          ->where('delete_status',1)
                          ->orderBy('id','DESC')
                          ->limit(3)->get();
     $newProducts= ProductResource::collection($newProduct);
                          //return $newProducts;
     return response()->json([
                          "error"=>"false",
                          "message"=>"Search Product Lists",
                          "category_data"=>$categories,
                          "product_data"=>$product,
                          "newProduct_data"=>$newProducts,

                        ]);

}// End Method
public function SearchProduct(Request $request){
    $request->validate(['search' => "required"]);
     $item = $request->search;
     $products = Product::with("brand",'category','subcategory','vendorone')
                        ->where('product_name','LIKE',"%$item%")
                        ->where('delete_status',1)
                        ->get();
 $product= ProductResource::collection($products);
                        //return $product;
      return response()->json([
                            "error"=>"false",
                            "message"=>"Search Product List",
                            "data"=>$product,
                            'total'=>$product->count()


                          ]);
     return view('frontend.product.search_product',compact('products'));

  }// End Method

  public function subCatWiseProduct(Request $request, $id,$slug){
    $products = Product::with("brand",'category','subcategory','vendorone')
                         ->where('delete_status',1)
                         ->where('status',1)
                         ->where('subcategory_id',$id)
                         ->orderBy('id','DESC')->get();
    $product= ProductResource::collection($products);
                 // return $product;
    $categories = Category::where('status',1)->orderBy('category_name','ASC')->get();
   // return $categories;
$breadsubcat = SubCategory::with('category')
                                ->where('status',1)->where('id',$id)->first();
         $breadsubcats = new SubCategoryResource($breadsubcat);
    //return $breadsubcats;
    $newProducts = Product::with("brand",'category','subcategory','vendorone')
                          ->where('delete_status',1)->orderBy('id','DESC')->limit(3)->get();
     $newProduct = ProductResource::collection($newProducts);
    //return $newProduct;

    return response()->json([
        "error"=>"false",
        "message"=>"Subcategory wise products",
        "product_data"=>$product,
        "category_data"=>$categories,
        "breadsubcat_data"=>$breadsubcats,
        "NewProduct_data"=>$breadsubcats
    ]);



}//End Method


}
