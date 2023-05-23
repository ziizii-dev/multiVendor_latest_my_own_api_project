<?php

namespace App\Http\Controllers\API\ADMIN\BLOG_MANAGE;

use Image;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogPostResource;
use Illuminate\Support\Facades\Validator;
use App\FileOperations\AdminProfileOperation;

class AdminBlogPostManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $bolgPostName = Request()->has('post_title') ? Request()->get('post_title') : '';
        $blogpost = BlogPost::where('delete_status',1)
                           ->where(function ($query) use ($bolgPostName) {
                     if (isset($bolgPostName)) {
                 $query->where('post_title', 'LIKE', $bolgPostName . '%');

                }
      return $query;
  })->get();
  $blogposts = BlogPostResource::collection($blogpost);

  return response()->json([
      'data' => $blogposts,
      'message' => 'BlogPost list.',
      'total' => $blogpost->count(),
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
        $this->blogpostValidationCheck($request);
           if($request->post_image){

            $image =  $request->post_image;
           // return $image;

            $operation = new AdminProfileOperation( $request->post_image,$request->name,'blog');
            $url = $operation->storeImage();
               //return $url;
               $data = BlogPost::insert([
                'category_id' => $request->category_id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
                'post_short_description' => $request->post_short_description,
                'post_long_description' => $request->post_long_description,
                'post_image' => $url,
                'created_at' => Carbon::now(),
            ]);
            return response()->json([
                "error"=>"false",
                "message"=>" Blog Post Inserted Successfully",
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
    $this->updateBlogpostValidationCheck($request);
    //return "hello";
   if($request->post_image == null){
    $data = BlogPost::findOrFail($id)->update([
        'category_id' => $request->category_id,
        'post_title' => $request->post_title,
        'post_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
        'post_short_description' => $request->post_short_description,
        'post_long_description' => $request->post_long_description,
        'updated_at' => Carbon::now(),
    ]);
    return response()->json([
        "error"=>"false",
        "message"=>" Blog Post  without image Updated Successfully",
        "data"=>$data
       ]);

           }else{
       $operation = new AdminProfileOperation( $request->post_image,$request->name,'banner');
         $url = $operation->storeImage();
         $data = BlogPost::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
            'post_short_description' => $request->post_short_description,
            'post_long_description' => $request->post_long_description,
            'post_image' => $url,
            'updated_at' => Carbon::now(),
        ]);

        return response()->json([
            "error"=>"false",
            "message"=>" Blog Post With Image Updated Successfully",
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
    $blogpost = BlogPost::findOrFail($id);
    if(isset($blogpost)){
        $blogpost->delete_status=0;
        if($blogpost->save()){
            return response()->json([
                "error"=>"false",
                "message"=>" Blog Post Deleted Successfully",
                "data"=>$blogpost
               ]);

        }

    }
    }//End method
     //Validation for post
     private function blogpostValidationCheck($request){
        Validator::make($request->all(),[
            'category_id'=>'required',
            'post_title'=>'required',
            'post_short_description'=>'required',
            'post_long_description'=>'required',
            'post_image'=>'required',
        ])->Validate();
     }//End
      //Validation for post
      private function updateBlogpostValidationCheck($request){
        Validator::make($request->all(),[
            'category_id'=>'required',
            'post_title'=>'required',
            'post_short_description'=>'required',
            'post_long_description'=>'required',

        ])->Validate();
     }//End

}
