<?php

namespace App\Http\Controllers\API\ADMIN;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class AdminStockProductController extends Controller
{
    public function ProductStock(){
        $products = Product::latest()->get();
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
