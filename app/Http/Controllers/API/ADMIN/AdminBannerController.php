<?php

namespace App\Http\Controllers\API\ADMIN;

use Image;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\FileOperations\AdminProfileOperation;

class AdminBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bannerName = Request()->has('banner_title') ? Request()->get('banner_title') : '';
        $banners = Banner::where('status',1)
                           ->where(function ($query) use ($bannerName) {
                     if (isset($bannerName)) {
                 $query->where('banner_title', 'LIKE', $bannerName . '%');

                }
      return $query;
  });

  return response()->json([
      'data' => $banners
                     ->get(),
      'message' => 'Banner list.',
      'total' => $banners->count(),
     // 'page' => (int)$page,
     // 'rowPerPages' => (int)$limit,
  ]);
    }

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

       if($request->banner_image){
        $this->addBannerValidationCheck($request);
        $image =  $request->banner_image;
       // return $image;

        $operation = new AdminProfileOperation( $request->banner_image,$request->name,'banner');
        $url = $operation->storeImage();
           //return $url;
           $data = Banner::insert([
            'banner_title'=>$request->banner_title,
            'banner_url'=>$request->banner_url,
            'banner_image'=>$url,

         ]);

        return response()->json([
         "error"=>false,
         "message"=>"Banner Created  Success.",
         "data"=>$data
        ]);
        }


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

         $this->updateBannerValidationCheck($request);
         //return "hello";
        if($request->banner_image == null){
            $data =Banner::findOrFail($id)->update([
                'banner_title'=>$request->banner_title,
                 'banner_url'=>$request->banner_url,
             ]);
            // return $data;
             return response()->json([
               "error"=>false,
               "message"=>"Slider Updated Without Image Successfully",
               "data"=>$data
              ]);
                }else{
            $operation = new AdminProfileOperation( $request->banner_image,$request->name,'banner');
              $url = $operation->storeImage();
              $data =  Banner::findOrFail($id)->update([
                'banner_title'=>$request->banner_title,
                'banner_url'=>$request->banner_url,
                'banner_image'=>$url,
             ]);
                //return $data;
                return response()->json([
                    "error"=>false,
                    "message"=>"Banner With Image  Updated Successfully",
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
       $banners = Banner::find($id);
        $img = $banners->banner_image;
        // unlink($img);
       if(isset($banners)){
           $banners->status=0;
           $notification = array(
               'message'=>"Banner Deleted Successfully",
               'alert-type'=>'success'
           );
           if($banners->save()){
            return response()->json([
                "error"=>false,
                "message"=>"Banner Deleted Successfully",
                "data"=>$banners
               ]);
           }
    }
}//End method
    //Validation
private function addBannerValidationCheck($request){
    Validator::make($request->all(),[
        'banner_title'=>'required',
        'banner_url'=>'required',
        'banner_image'=>'required'

    ])->Validate();
 }//End Method
 //Validation
private function updateBannerValidationCheck($request){
    Validator::make($request->all(),[
        'banner_title'=>'required',
        'banner_url'=>'required',


    ])->Validate();
 }//End Method
}
