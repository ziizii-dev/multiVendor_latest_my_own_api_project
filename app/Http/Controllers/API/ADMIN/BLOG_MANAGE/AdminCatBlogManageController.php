<?php

namespace App\Http\Controllers\API\ADMIN\BLOG_MANAGE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class AdminCatBlogManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogCatName = Request()->has('blog_category_name') ? Request()->get('blog_category_name') : '';
        $blogcategoryies = BlogCategory::where('delete_status',1)
                           ->where(function ($query) use ($blogCatName) {
                     if (isset($blogCatName)) {
                 $query->where('blog_category_name', 'LIKE', $blogCatName . '%');

                }
      return $query;
  });

  return response()->json([
      'data' => $blogcategoryies
                     ->get(),
      'message' => 'BlogCategory list.',
      'total' => $blogcategoryies->count(),
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
        $this->blogcatValidationCheck($request);
      $data =  BlogCategory::insert([
            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug' => strtolower(str_replace(' ', '-',$request->blog_category_name)),
            'created_at' => Carbon::now(),
        ]);
       return response()->json([
        "error"=>"false",
        "message"=>" Blog Category Inserted Successfully",
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
        $this->blogcatValidationCheck($request);
//return $id;
         $data = BlogCategory::findOrFail($id)->update([
              'blog_category_name' => $request->blog_category_name,
              'blog_category_slug' => strtolower(str_replace(' ', '-',$request->blog_category_name)),
          ]);
          return response()->json([
            "error"=>"false",
            "message"=>" Blog Category Updated Successfully",
            "data"=>$data
           ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    $blogcategoryies = BlogCategory::findOrFail($id);

    if(isset($blogcategoryies)){
        $blogcategoryies->delete_status=0;
        if($blogcategoryies->save()){
            return response()->json([
                "error"=>"false",
                "message"=>" Blog Category Deleted Successfully",
                "data"=>$blogcategoryies
               ]);
        }

    }
    }//End method

     //Validation
     private function blogcatValidationCheck($request){
        Validator::make($request->all(),[
            'blog_category_name'=>'required',
        ])->Validate();
     }//End method
}
