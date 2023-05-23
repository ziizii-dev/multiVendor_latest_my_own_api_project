<?php

namespace App\Http\Controllers\API\VENDOR;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdminReviewResource;

class VendorReviewManageController extends Controller
{
    public function PendingReview($vendor_id){

        $ratingName = Request()->has('rating') ? Request()->get('rating') : '';
        $review = Review::where('status',0)
                           ->where("vendor_id",$vendor_id)
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
    public function ReviewApprove($vendor_id,$id){
        $data = Review::where('vendor_id',$vendor_id)
                       ->where('id',$id)
                      ->update(['status' => 1]);

        return response()->json([
            "error"=>false,
            "message"=>"Review Approved Successfully",
            "data"=>true
        ]);
    }// End Method
    ///Public Review
    public function PublishReview($vendor_id){
        $ratingName = Request()->has('rating') ? Request()->get('rating'):'';
        $review = Review::where('status',1)
                        ->where('vendor_id',$vendor_id)
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
    public function ReviewDelete($vendor_id,$id){
        $reviews =Review::where('vendor_id',$vendor_id)->findOrFail($id);
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
