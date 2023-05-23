<?php

namespace App\Http\Controllers\API\ADMIN;

use Image;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use App\FileOperations\AdminProfileOperation;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryName = Request()->has('category_name') ? Request()->get('category_name') : '';
        $categories = Category::where('status',1)
                           ->where(function ($query) use ($categoryName) {
                     if (isset($categoryName)) {
                 $query->where('category_name', 'LIKE', $categoryName . '%');

                }
      return $query;
  });
  return response()->json([
      'data' => $categories
                     ->get(),
      'message' => 'Category list.',
      'total' => $categories->count(),
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
           ///////////////////
           $this->addCategoryValidationCheck($request);
           if($request->category_image){
               $image =  $request->category_image;
               $operation = new AdminProfileOperation( $request->category_image,$request->name,'category');
               $url = $operation->storeImage();
                 // return $url;
                }
                $data = Category::insert([
                    'category_name'=>$request->category_name,
                    'category_slug'=>strtolower(str_replace(' ','-',$request->category_name)),
                    'category_image'=>$url,

                 ]);
                 return response()->json([
                     "error"=>false,
                     "message"=>"Category Create Successfully",
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
        $this->updateCategoryValidationCheck($request);
    //////////
    if($request->category_image == null){
        $data =  Category::findOrFail($id)->update([
            'category_name'=>$request->category_name,
            'category_slug'=>strtolower(str_replace(' ','-',$request->category_name)),
         ]);
       //   return $data;
         return response()->json([
           "error"=>false,
           "message"=>"Updated Category Without Image Successfully",
           "data"=>$data
          ]);
            }else{
          $operation = new AdminProfileOperation( $request->category_image,$request->name,'category');
          $url = $operation->storeImage();
          $data =  Category::findOrFail($id)->update([
            'category_name'=>$request->category_name,
            'category_slug'=>strtolower(str_replace(' ','-',$request->category_name)),
            'category_image'=>$url,
         ]);
            //return $data;
                    return response()->json([
                        "error"=>false,
                        "message"=>"Category With Image Updated Successfully",
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
        $category = Category::find($id);
        $img = $category->category_image;
        // unlink($img);
       if(isset($category)){
           $category->status=0;

           if($category->save()){
            return response()->json([
                "error"=>false,
                "message"=>"Category Deleted Success",
                "data"=>$category
               ]);
           }

       }
    }//End method
    //Validation
private function addCategoryValidationCheck($request){
    Validator::make($request->all(),[
        'category_name'=>'required',
        'category_image'=>'required'

    ])->Validate();
 }//End method
 private function updateCategoryValidationCheck($request){
    Validator::make($request->all(),[
        'category_name'=>'required',


    ])->Validate();
 }//End method
}
