<?php

namespace App\Http\Controllers\API\ADMIN;

use Image;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\FileOperations\AdminProfileOperation;

class AdminSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 $sliderName = Request()->has('slider_title') ? Request()->get('slider_title') : '';
        $sliders = Slider::where('status',1)
        ->where(function ($query) use ($sliderName) {
  if (isset($sliderName)) {
$query->where('slider_title', 'LIKE', $sliderName . '%');

}
return $query;
});

return response()->json([
'data' => $sliders
  ->get(),
'message' => 'Slider list.',
'total' => $sliders->count(),
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

        if($request->slider_image){
            $this->addSliderValidationCheck($request);
            $image =  $request->slider_image;
           // return $image;

            $operation = new AdminProfileOperation( $request->slider_image,$request->name,'slider');
            $url = $operation->storeImage();
               //return $url;
               $data = Slider::insert([
                'slider_title'=>$request->slider_title,
                'short_title'=>$request->short_title,
                'slider_image'=>$url,

             ]);

             return response()->json([
                'error'=>"false",
                "message"=>"Slider created successfully",
                "data"=>$data
               ]);
            }

    }

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
        $this->updateSliderValidationCheck($request);
        //////////
        if($request->slider_image == null){
            $data =  Slider::findOrFail($id)->update([
                'slider_title'=>$request->slider_title,
                'short_title'=>$request->short_title,
             ]);
           //   return $data;
             return response()->json([
               "error"=>false,
               "message"=>"Slider Updated Without Image Successfully",
               "data"=>$data
              ]);
                }else{
            $operation = new AdminProfileOperation( $request->slider_image,$request->name,'slider');
              $url = $operation->storeImage();
              $data =  Slider::findOrFail($id)->update([
                'slider_title'=>$request->slider_title,
                'short_title'=>$request->short_title,
                "slider_image"=>$url
             ]);
                //return $data;
                        return response()->json([
                            "error"=>false,
                            "message"=>"Slider With Image Updated Successfully",
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
        $sliders = Slider::find($id);

    $img = $sliders->slider_image;
    // unlink($img);
   if(isset($sliders)){
       $sliders->status=0;
       if($sliders->save()){
        return response()->json([
            'error'=>"false",
            "message"=>"Slider Deleted Successfully",
            "data"=>$sliders
           ]);
       }
   }
    }
    //Validation
private function addSliderValidationCheck($request){
    Validator::make($request->all(),[
        'slider_title'=>'required',
        'short_title'=>'required',
        'slider_image'=>'required'

    ])->Validate();
 }//End Method
 //Validation
private function updateSliderValidationCheck($request){
    Validator::make($request->all(),[
        'slider_title'=>'required',
        'short_title'=>'required',
       // 'slider_image'=>'required'

    ])->Validate();
 }//End Method
}
