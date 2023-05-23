<?php

namespace App\Http\Controllers\API\USER\Blog;

use Image;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogPostResource;
use Illuminate\Support\Facades\Validator;

class UserBlogController extends Controller
{

    //Get All Blog Category
    public function AllBlogCategory(){
        $blogCatName = Request()->has('blog_category_name') ? Request()->get('blog_category_name') : '';

        $blogcategoryies = BlogCategory::where('delete_status',1)
                           ->where(function ($query) use ($blogCatName) {
                     if (isset($blogCatName)) {
                 $query->where('blog_category_name', 'LIKE', $blogCatName . '%');

                }
      return $query;
  });

  return response()->json([
        "error"=>"false",
       'message' => 'Blog Category list.',
       'data' => $blogcategoryies->get(),
      'total' => $blogcategoryies->count(),
     // 'page' => (int)$page,
     // 'rowPerPages' => (int)$limit,
  ]);
       // $blogcategoryies = BlogCategory::where('delete_status',1)->latest()->get();
       // $blogpost = BlogPost::where('delete_status',1)->latest()->get();
        return view('frontend.blog.home_blog',compact('blogcategoryies','blogpost'));
    }// End Method

     //Get All Blog Posts
     public function AllBlogPost(){
        $blogPostName = Request()->has('post_title') ? Request()->get('post_title') : '';

        $blogposts = BlogPost::with('blogcategory')
                           ->where('delete_status',1)
                           ->where(function ($query) use ($blogPostName) {
                     if (isset($blogPostName)) {
                 $query->where('post_title', 'LIKE', $blogPostName . '%');

                }
      return $query;
  });
  //$blogpost = BlogPostResource::collection($blogposts);
  $blogpost1 = $blogposts->get();
  //return $blogpost1;
  $blogpost = BlogPostResource::collection($blogpost1);
//eturn $blogpost;
  return response()->json([
        "error"=>"false",
       'message' => 'Blog Category list.',
      'data' => $blogpost,
      'total' => $blogpost->count(),
     // 'page' => (int)$page,
     // 'rowPerPages' => (int)$limit,
  ]);
       // $blogcategoryies = BlogCategory::where('delete_status',1)->latest()->get();
       // $blogpost = BlogPost::where('delete_status',1)->latest()->get();
       // return view('frontend.blog.home_blog',compact('blogcategoryies','blogpost'));
    }// End Method

    //For Blog Post
    public function BlogDetails($id,$slug){
        $blogcategoryies = BlogCategory::where('delete_status',1)
                                          ->latest()
                                          ->get();
                //return $blogcategoryies;
        $blogdetails = BlogPost::with('blogcategory')
                                 ->where('delete_status',1)->findOrFail($id);
           $blogdetail = new BlogPostResource($blogdetails);
       // return $blogdetail;
        $breadcat = BlogCategory::where('delete_status',1)->where('id',$id)->first();
        //return $breadcat;
        //return view('frontend.blog.blog_details',compact('blogcategoryies','blogdetails','breadcat'));
        return response()->json([
            "error"=>"false",
            "message"=>" Blog Post Detail Lists",
           "blogcategory_data"=>$blogcategoryies,
           "blogdetail_data"=>$blogdetail,
           "breadcat_data"=>$breadcat
           ]);

    }// End Method
     //Blog Category Details
     public function BlogPostCategory($id,$slug){
        $blogcategoryies = BlogCategory::where('delete_status',1)->latest()->get();
        $blogpost = BlogPost::where('delete_status',1)
                             ->where('category_id',$id)
                             ->get();
        $breadcat = BlogCategory::where('delete_status',1)->where('id',$id)->get();
        return response()->json([
            "error"=>"false",
            "message"=>" Blog Category Detail Lists",
            "data"=>[$blogcategoryies,$blogpost,$breadcat]
           ]);


    }// End Method
}
