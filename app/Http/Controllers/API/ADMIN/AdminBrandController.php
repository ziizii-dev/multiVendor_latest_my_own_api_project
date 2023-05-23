<?php

namespace App\Http\Controllers\API\ADMIN;

use Image;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\BrandUpdateReqest;
use App\FileOperations\AdminProfileOperation;

class AdminBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brandName = Request()->has('brand_name') ? Request()->get('brand_name') : '';
        $brands = Brand::where('status',1)
                         ->where(function ($query) use ($brandName) {
                  if (isset($brandName)) {
                       $query->where('brand_name', 'LIKE', $brandName . '%');

                      }
            return $query;
        });

        return response()->json([
            'data' => $brands
                           ->get(),
            'message' => 'Brand list.',
            'total' => $brands->count(),
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

        if($request->brand_image){
            $image =  $request->brand_image;
            $this->addBrandValidationCheck($request);
            //return $image;
            $operation = new AdminProfileOperation( $request->brand_image,$request->name,'brand');
            $url = $operation->storeImage();
              // return $url;
             }
       $data = Brand::insert([
           'brand_name'=>$request->brand_name,
           'brand_slug'=>strtolower(str_replace(' ','-',$request->brand_name)),
           'brand_image'=>$url,

        ]);
       return response()->json([
        "error"=>false,
        "message"=>"Create Brand Successfully",
        "data"=>$data
       ]);
    }//End metod

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

        $this->updateBrandValidationCheck($request);
    //////////
    if($request->brand_image == null){
        $data =  Brand::findOrFail($id)->update([
            'brand_name'=>$request->brand_name,
            'brand_slug'=>strtolower(str_replace(' ','-',$request->brand_name)),
         ]);
       //   return $data;
         return response()->json([
           "error"=>false,
           "message"=>"Updated Brand Without Image Successfully",
           "data"=>$data
          ]);
            }else{
        $operation = new AdminProfileOperation( $request->brand_image,$request->name,'brand');
          $url = $operation->storeImage();
          $data =  Brand::findOrFail($id)->update([
            'brand_name'=>$request->brand_name,
            'brand_slug'=>strtolower(str_replace(' ','-',$request->brand_name)),
            'brand_image'=>$url,
         ]);
            //return $data;
                    return response()->json([
                        "error"=>false,
                        "message"=>"Brand With Image Updated Successfully",
                        "data"=>$data
                       ]);
                    }

    }//End method

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        // dd($brand);
        $img = $brand->brand_image;
       // unlink($img);
       if(isset($brand)){
           $brand->status=0;

           if($brand->save()){
            return response()->json([
                "error"=>false,
                "message"=>"Brand  Deleted Success",
                "data"=>$brand
               ]);

           }

       }
    }//End method
    //Validation
    private function addBrandValidationCheck($request){
        Validator::make($request->all(),[
            'brand_name'=>'required',
            'brand_image'=>'required'

        ])->Validate();
     }//End method
     //Validation
    private function updateBrandValidationCheck($request){
        Validator::make($request->all(),[
            'brand_name'=>'required',
            //'brand_image'=>'required'

        ])->Validate();
     }//End method
}
