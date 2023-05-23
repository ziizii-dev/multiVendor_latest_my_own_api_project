<?php

namespace App\Http\Controllers\API\VENDOR;

use Image;
use App\Models\Product;
use App\Models\MultiImg;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Validator;
use App\FileOperations\AdminProfileOperation;

class VendorProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($vendor_id)
    {

       // $page = Request()->has('page') ? Request()->get('page') : 1;
       // $limit = Request()->has('limit') ? Request()->get('limit') : 10;
        $productName = Request()->has('product_name') ? Request()->get('product_name') : '';
        //return $productName;
        //return Product::where('delete_status',1)->get();
        $products = Product::with("brand",'category','subcategory','vendor')
                             -> where('delete_status',1)
                             ->where("vendor_id",$vendor_id)
                             ->where(function ($query) use ($productName) {
                                if (isset($productName)) {
                                    $query->where('product_name', 'LIKE', $productName . '%');

                                }
                                return $query;
                            })->get();

         $product= ProductResource::collection($products);
        return response()->json([
            'data' => $product,
            'message' => 'Product list.',
            'total' => $products->count(),
           // 'page' => (int)$page,
           // 'rowPerPages' => (int)$limit,
        ]);

    }//End method

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
    $this->storeProductValidationCheck($request);
if($request->product_thambnail){
    $image =  $request->product_thambnail;
    //return $image;
    $operation = new AdminProfileOperation( $request->product_thambnail,$request->name,'products');
    $url = $operation->storeImage();
       // return $url;
     }
/////////

if($request->product_color){
    $colors = $request->product_color;
    // return $colors;
 $data = [];
 for($i=0;$i<count($colors);$i++){
     array_push($data,$colors[$i]);


 }
 $colorData = implode (",",$data);



};
if($request->product_size){
    $sizes = $request->product_size;
    // return $sizes;
 $data = [];
 for($i=0;$i<count($sizes);$i++){
     array_push($data,$sizes[$i]);


 }
 $sizeData = implode (",",$data);



};
if($request->product_tags){
    $tags = $request->product_tags;
    // return $sizes;
 $data = [];
 for($i=0;$i<count($tags);$i++){
     array_push($data,$tags[$i]);


 }
 $tagData = implode (",",$data);
};

    $product_id = Product::insertGetId([
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'product_slug'=>strtolower(str_replace(' ','-',$request->product_name)),
            'product_code'=>$request->product_code,
            'product_qty'=>$request->product_qty,
            'product_tags'=> $tagData,
            'product_size'=> $sizeData,
            'product_color'=>$colorData,
            'selling_price'=>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_descp'=>$request->short_descp,
            'long_descp'=>$request->long_descp,
            'product_thambnail'=>$url,
             'vendor_id'=>$request->vendor_id,
            'hot_deals'=>$request->hot_deals,
            'featured'=>$request->featured,
            'special_offer'=>$request->special_offer,
            'special_deals'=>$request->special_deals,
            'status'=>1,
            'created_at'=>Carbon::now(),

    ]);
//return $product_id;
////////////
if($request->multi_img){
 $images = $request->multi_img;
//  return $images;
 foreach($images as $img){
    //return $img;
    $operation = new AdminProfileOperation($img,$request->name,'products');
    //return $operation;
    $urlMulti = $operation->storeImage();
    $data = MultiImg::insert([
        'product_id'=>$product_id,
        'photo_name'=> $urlMulti,
        'vendor_id'=>$request->vendor_id,
       // "vendor_id"=>$vendor_id
        // 'created_at' =>Carbon::now(),
    ]);
 }
}
   // };//End foreach
   //return $data;
    return response()->json([
        "error"=>false,
        "message"=>"Product Create Successfully",
        "data"=>$data
    ]);
    }//End method

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       //return "hello";

         $this->updateProductValidationCheck($request);

if($request->product_color){
    $colors = $request->product_color;
    // return $colors;
 $data = [];
 for($i=0;$i<count($colors);$i++){
     array_push($data,$colors[$i]);

 }
 $colorData = implode (",",$data);



};
if($request->product_size){
    $sizes = $request->product_size;
    // return $sizes;
 $data = [];
 for($i=0;$i<count($sizes);$i++){
     array_push($data,$sizes[$i]);


 }
 $sizeData = implode (",",$data);



};
if($request->product_tags){
    $tags = $request->product_tags;
    // return $sizes;
 $data = [];
 for($i=0;$i<count($tags);$i++){
     array_push($data,$tags[$i]);

 }
 $tagData = implode (",",$data);



};
       // $product_id = $request->id;
       if($request->product_thambnail == null){
        $data = Product::findOrFail($id) ->update([
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'product_slug'=>strtolower(str_replace(' ','-',$request->product_name)),
            'product_code'=>$request->product_code,
            'product_qty'=>$request->product_qty,
            'product_tags'=> $tagData,
            'product_size'=> $sizeData,
            'product_color'=>$colorData,
            'selling_price'=>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_descp'=>$request->short_descp,
            'long_descp'=>$request->long_descp,
            'vendor_id'=>$request->vendor_id,
            'hot_deals'=>$request->hot_deals,
            'featured'=>$request->featured,
            'special_offer'=>$request->special_offer,
            'special_deals'=>$request->special_deals,
            'status'=>1,
            'updated_at'=>Carbon::now(),
    ]);
    return response()->json([
        "error"=>false,
        "message"=>"Product Updated Without Image Successfully",
        "data"=>$data
    ]);

    }else{

       $operation = new AdminProfileOperation( $request->product_thambnail,$request->name,'product_images');
       $url = $operation->storeImage();
       $data = Product::findOrFail($id) ->update([
        'brand_id'=>$request->brand_id,
        'category_id'=>$request->category_id,
        'subcategory_id'=>$request->subcategory_id,
        'product_name'=>$request->product_name,
        'product_slug'=>strtolower(str_replace(' ','-',$request->product_name)),
        'product_code'=>$request->product_code,
        'product_qty'=>$request->product_qty,
        'product_tags'=>$request->product_tags,
        'product_size'=>$request->product_size,
        'product_color'=>$request->product_color,
        'selling_price'=>$request->selling_price,
        'discount_price'=>$request->discount_price,
        'short_descp'=>$request->short_descp,
        'long_descp'=>$request->long_descp,
        'vendor_id'=>$request->vendor_id,
        'hot_deals'=>$request->hot_deals,
        'featured'=>$request->featured,
        'special_offer'=>$request->special_offer,
        'special_deals'=>$request->special_deals,
        'status'=>1,
        'updated_at'=>Carbon::now(),
        'product_thambnail'=>$url,

]);
return response()->json([
    "error"=>false,
    "message"=>"Product Updated With Image Successfully",
    "data"=>$data
]);

    }

    }//End method


//Update Multi Image
public function vendorUpdateProductMultiImage(Request $request,$vendor_id,$multiImg_id){
    //return $id;
   // $imgs = $request->multi_img;
  //return $imgs;
  if($request->multi_img == null){
    $data= MultiImg::where('vendor_id',$vendor_id)-> where("id",$multiImg_id)->update([


    ]);
    //return $data;
    return response()->json([
       "error"=>false,
       "message"=>"MultiImg Updated Without Image Successfully",
       "data"=>true
      ]);
   }else{
// $image =  $request->product_thambnail;
       // return $image;
       $operation = new AdminProfileOperation( $request->multi_img,$request->name,'product_images');
       $url = $operation->storeImage();
       //return $url;
      $data= MultiImg::where('vendor_id','=',$vendor_id)->where('id',$multiImg_id)->update([
       'photo_name'=>$url,

    ]);
    //return $data;
    return response()->json([
       "error"=>false,
       "message"=>"Image Updated With Image Successfully",
       "data"=>true
      ]);
   }
}//End Method

//For product detail multi-images
public function detailProductMultiImage(Request $request,$vendor_id, $product_id){
    $data = MultiImg::where('vendor_id',$vendor_id)->where('delete_status',1)->where("product_id",$product_id)->get();
    //return $data;
    $result = $data->map(function($item){
        return[
            $item->photo_name
        ];
    });
   // return $result;
    return response()->json([
        "error"=>false,
        "message"=>"Multi Images Lists",
        "data"=>$result
       ]);

}//End method

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = Product::findOrFail($id);
       // ->findOrFail($id);
        //  unlink($product->product_thambnail);
        //  Product::findOrFail($id)->delete();
            $product->delete_status = 0;
           $product->save();
            $imgs = MultiImg::where('product_id',$id)->get();
           //return $imgs;

$result = $imgs->map(function($item){
    return [
        $item->delete_status = 0,
        $item->save()
    ];
    });
//return $result;
return response()->json([
    "error"=>false,
    "message"=>"Product Deleted Successfully",
    "data"=>$result,
    "data"=>$product
]);

    }//End method

    //Inactive Product
public function vendorInactiveProduct(Request  $request,$id){
    //return $id;
   $data = Product::where('delete_status',1)->findOrFail($id)->update([
       'status'=>0,
    ]);
    return response()->json([
        "error"=>false,
        "message"=>"Inacitve Product Successfully",
        "data"=>$data
    ]);

}//End Method

    //Active Product
    public function vendorActiveProduct(Request  $request,$id){
       // return $id;
       $data = Product::where('delete_status',1)->findOrFail($id)->update([
           'status'=>1,
        ]);
        return response()->json([
            "error"=>false,
            "message"=>"Acitve Product Successfully",
            "data"=>$data
        ]);

    }//End Method


    //Validation
private function storeProductValidationCheck($request){
    Validator::make($request->all(),[
        "brand_id" =>"required",
        "category_id" =>"required",
        "subcategory_id" =>"required",
        "product_name" =>"required",
        "product_code" =>"required",
        "product_qty" =>"required",
        "selling_price" =>"required",
        "discount_price" =>"required",
        "short_descp" =>"required",
        "long_descp" =>"required",
        "product_thambnail" =>'required',
         "multi_img"=>'required'

    ])->Validate();
 }//End method
 //Validation
private function updateProductValidationCheck($request){
    Validator::make($request->all(),[
        "brand_id" =>"required",
        "category_id" =>"required",
        "subcategory_id" =>"required",
        "product_name" =>"required",
        "product_code" =>"required",
        "product_qty" =>"required",
        "selling_price" =>"required",
        "discount_price" =>"required",
        "short_descp" =>"required",
        "long_descp" =>"required",

    ])->Validate();
 }//End
}
