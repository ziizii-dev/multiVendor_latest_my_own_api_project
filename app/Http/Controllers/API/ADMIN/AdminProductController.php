<?php
namespace App\Http\Controllers\API\ADMIN;
use Image;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\MultiImg;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Validator;
use App\FileOperations\AdminProfileOperation;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $page = Request()->has('page') ? Request()->get('page') : 1;
       // $limit = Request()->has('limit') ? Request()->get('limit') : 10;
       $productName = Request()->has('product_name') ? Request()->get('product_name') : '';
       //return $productName;
       //return Product::where('delete_status',1)->get();
       $products = Product::with("brand",'category','subcategory','vendorone')
                            ->where('delete_status',1)
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
    }//End method
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
    public function update(Request $request, $id)
    {

      //return $id;
      $this->updateProductValidationCheck($request);

if($request->product_color){
    $colors = $request->product_color;
    // return $colors;
 $data = [];
 for($i=0;$i<count($colors);$i++){
     array_push($data,$colors[$i]);

 }
 $colorData = implode (",",$data);



}else{
    return response()->json([
        "error"=>true,
        "message"=>"Fill color",

    ]);
};
if($request->product_size){
    $sizes = $request->product_size;
    // return $sizes;
 $data = [];
 for($i=0;$i<count($sizes);$i++){
     array_push($data,$sizes[$i]);


 }
 $sizeData = implode (",",$data);



}else{
    return response()->json([
        "error"=>true,
        "message"=>"Fill size",

    ]);
};
if($request->product_tags){
    $tags = $request->product_tags;
    // return $sizes;
 $data = [];
 for($i=0;$i<count($tags);$i++){
     array_push($data,$tags[$i]);

 }
 $tagData = implode (",",$data);



}else{
    return response()->json([
        "error"=>true,
        "message"=>"Fill tags",

    ]);
};
      // $product_id = $request->id;
          $data = Product::findOrFail($id)->update([
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
           // 'created_at'=>Carbon::now(),
   ]);
   return response()->json([
       "error"=>false,
       "message"=>"Product Updated Success.",
       "data"=>$data
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

//Update product thambnail
public function adminUpdateProductThambnail(Request $request,$product_id){
    if($request->product_thambnail == null){
     $data= Product::findOrFail($product_id)->update([

     ]);

     return response()->json([
        "error"=>false,
        "message"=>"Product Updated Without Image Successfully",
        "data"=>$data
       ]);
    }else{

        $operation = new AdminProfileOperation( $request->product_thambnail,$request->name,'product_images');
        $url = $operation->storeImage();
       $data= Product::findOrFail($product_id)->update([
        'product_thambnail'=>$url,

     ]);
     return response()->json([
        "error"=>false,
        "message"=>"Product Updated With Image Successfully",
        "data"=>$data
       ]);

    }

}//End Method
//Update Multi Image
public function adminUpdateProductMultiImage(Request $request,$id){
  if($request->multi_img == null){
    $data= MultiImg:: where("id",$id)->update([
    ]);
    //return $data;
    return response()->json([
       "error"=>false,
       "message"=>"MultiImg Updated Without Image Successfully",
       "data"=>$data
      ]);
   }else{
       $operation = new AdminProfileOperation( $request->multi_img,$request->name,'product_images');
       $url = $operation->storeImage();
       //return $url;
      $data= MultiImg::findOrFail($id)->update([
       'photo_name'=>$url,

    ]);
    //return $data;
    return response()->json([
       "error"=>false,
       "message"=>"Image Updated With Image Successfully",
       "data"=>$data
      ]);
   }
}//End Method

//For product detail multi-images
public function detailProductMultiImage(Request $request, $product_id){
    $data = MultiImg::where('delete_status',1)->where("product_id",$product_id)->get();
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
//Inactive Product
public function adminInactiveProduct(Request  $request,$id){
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
public function adminActiveProduct(Request  $request,$id){
    //return $id;
   $data = Product::where('delete_status',1)->findOrFail($id)->update([
       'status'=>1,
    ]);
    return response()->json([
        "error"=>false,
        "message"=>"Acitve Product Successfully",
        "data"=>$data
    ]);

}//End Method
///Vendor all
public function vendorAll(){
     $vendors = Vendor::get();
     return$vendors;
}//End method
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
