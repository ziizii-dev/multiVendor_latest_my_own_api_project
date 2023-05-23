<?php

namespace App\Http\Controllers\API\ADMIN;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdminReviewResource;

class AdminReviewManageController extends Controller
{
    public function PendingReview(){

        $ratingName = Request()->has('rating') ? Request()->get('rating') : '';
        $review = Review::where('status',0)
                           ->orderBy('id','DESC')
                           ->where(function ($query) use ($ratingName) {
                     if (isset($ratingName)) {
                 $query->where('rating', 'LIKE', $ratingName . '%');
                }
      return $query;
    })->get();
    //return $review;
        $reviews = AdminReviewResource::collection($review);
       return response()->json([
        "error"=>false,
        "message"=>"Pending Review Lists",
        "data"=>$reviews,
        "total"=>$reviews->count()
       ]);
    }// End Method
    ///Review approve
    public function ReviewApprove($id){
        $data = Review::where('id',$id)->update(['status' => 1]);

        return response()->json([
            "error"=>false,
            "message"=>"Review Approved Successfully",
            "data"=>true
        ]);
    }// End Method
    ///Public Review
    public function PublishReview(){
        $ratingName = Request()->has('rating') ? Request()->get('rating'):'';
        $review = Review::where('status',1)
                        ->where('delete_status',1)
                        ->orderBy('id','DESC')
                        ->where(function($query) use ($ratingName){
                            if(isset($ratingName)){
                                $query->where("rating",'LIKE',$ratingName.'%');
                            }
                            return $query;
                        }) -> get();
           // return $review;
          $reviews = AdminReviewResource::collection($review);
          return response()->json([
            "error"=>false,
            "message"=>"Public Review Lists",
            "data"=>$reviews,
            "total"=>$reviews->count()
           ]);
    }// End Method
    //Review Delete
    public function ReviewDelete($id){
        $reviews =Review::findOrFail($id);
        if(isset($reviews)){
            $reviews->delete_status=0;

            if($reviews->save()){

               return response()->json([
                "error"=>false,
                "message"=>"Review Deleted Successfully",
                "data"=>true,
               ]);

            }

        }

    }// End Method
}
