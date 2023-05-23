<?php

namespace App\Http\Controllers\API\VENDOR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\SubCategoryResource;
class VendorSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategoryName = Request()->has('subcategory_name') ? Request()->get('subcategory_name') : '';
        $subcategories = SubCategory::with("category")
                           ->where('status',1)
                           ->where(function ($query) use ($subcategoryName) {
                     if (isset($subcategoryName)) {
                 $query->where('subcategory_name', 'LIKE', $subcategoryName . '%');

                }
      return $query;
  })->get();

  $subcategory = SubCategoryResource::collection($subcategories);
  //return $subcategory;

  return response()->json([
      'data' => $subcategory,

      'message' => 'Category list.',
      'total' => $subcategories->count(),
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
    $this->SubCategoryValidationCheck($request);

    $data = SubCategory::insert([
        'category_id'=>$request->category_id,
        'subcategory_name'=>$request->subcategory_name,
        'subcategory_slug'=>strtolower(str_replace(' ','-',$request->subcategory_name)),

     ]);

    return response()->json([
     'error'=>"false",
     "message"=>"Subcategory created success",
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
        //$subcattegory_id = $request->id;
        $this->SubCategoryValidationCheck($request);

   $data = SubCategory::findOrFail($id)->update([
       'category_id'=>$request->category_id,
       'subcategory_name'=>$request->subcategory_name,
       'subcategory_slug'=>strtolower(str_replace(' ','-',$request->subcategory_name)),

    ]);
    return response()->json([
        'error'=>"false",
        "message"=>"Subcategory updated success",
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
        $subcategory = SubCategory::findOrFail($id);
        if(isset($subcategory)){
            $subcategory->status=0;
            if($subcategory->save()){
             return response()->json([
                 'error'=>"false",
                 "message"=>"Subcategory deleted success",

                ]);
            }
        }
    }//End method
    //Validation
    private function SubCategoryValidationCheck($request){
        Validator::make($request->all(),[
            'category_id'=>'required',
            'subcategory_name'=>'required',

        ])->Validate();
     }
}
