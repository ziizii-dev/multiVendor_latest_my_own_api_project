<?php

namespace App\Http\Controllers\API\VENDOR;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class VendorStockProductController extends Controller
{

    public function VendorProductStock($vendor_id){
        $products = Product::where('vendor_id',$vendor_id)->latest()->get();
        //return $products;
        $product= ProductResource::collection($products);
       return response()->json([
        "error"=>false,
        "message"=>"Stock Product Lists",
        "data"=>$product,
        "total"=>$product->count()

       ]);
    }// End Method
}
