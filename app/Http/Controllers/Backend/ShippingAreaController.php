<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Category;
use App\Models\ShipDivision;
use App\Models\ShipDistricts;
use App\Models\ShipState;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ShippingAreaController extends Controller
{
     //all coupon
     public function allDivision(){
        $division = ShipDivision::where('delete_status',1)->latest()->get();

        return view('backend.ship.division.division_all',compact('division'));
    }//end method
     //Add coupon
     public function addDivision(){
        return view("backend.ship.division.division_add");
  }//End method

   ///Store coupon
   public function storeDivision(Request $request){
    // return $request;
    $this->divisionValidationCkeck($request);

         ShipDivision::insert([
            'division_name'=>$request->division_name,
            "created_at"=>Carbon::now()


         ]);
         $notification = array(
            'message'=>"Division inserted Successfully",
            'alert-type'=>'success'
        );
        return redirect()->route('all#division')->with($notification);
}//End Method

//Edit Division

public function editDivision($id){
    // $coupons= Coupon::where('status',1)->orderBy('coupon_name',"ASC")->get();
    $division = ShipDivision::findOrfail($id);
    return view('backend.ship.division.division_edit',compact('division'));
}//End Method


//Update division

public function updateDivision(Request $request){
    $division_id = $request->id;
    // return $coupon_id;
    $this->divisionValidationCkeck($request);

    ShipDivision::findOrFail($division_id)->update([
//    'coupon_id'=>$request->coupon_id,
   'division_name'=>$request->division_name,


]);
$notification = array(
   'message'=>"Division Updated Successfully",
   'alert-type'=>'success'
);
return redirect()->route('all#division')->with($notification);
}//End Method

  //Delete Division
  public function deleteDivision($id){

    $division = ShipDivision::findOrfail($id);

   if(isset($division)){
       $division->delete_status=0;
       $notification = array(
           'message'=>" Division Deleted Successfully",
           'alert-type'=>'success'
       );
       if($division->save()){
           return redirect()->back()->with($notification);
       }

   }
}//End method

///////District Section
//all disctict
 //all coupon
 public function allDistrict(){
    $district = ShipDistricts::where('delete_status',1)->latest()->get();

    return view('backend.ship.district.district_all',compact('district'));
}//end method
 //Add district
 public function addDistrict(){
    $division = ShipDivision::where('delete_status',1)->orderBy('division_name','ASC')->get();
    return view("backend.ship.district.district_add",compact('division'));
}//End method

 ///Store district
 public function storeDistrict(Request $request){
    // return $request;
    $this->districtValidationCkeck($request);

    ShipDistricts::insert([
            'division_id'=>$request->division_id,
            'district_name'=>$request->district_name,
            "created_at"=>Carbon::now()


         ]);
         $notification = array(
            'message'=>"District inserted Successfully",
            'alert-type'=>'success'
        );
        return redirect()->route('all#district')->with($notification);
}//End Method



//Edit District

public function editDistrict($id){
    $division = ShipDivision::where('delete_status',1)->orderBy('division_name','ASC')->get();
    $district = ShipDistricts::findOrFail($id);
    return view('backend.ship.district.district_edit',compact('district','division'));
}//End Method

public function updateDistrict(Request $request){
    $this->districtValidationCkeck($request);
    $district_id = $request->id;

     ShipDistricts::findOrFail($district_id)->update([

         'division_id' => $request->division_id,
        'district_name' => $request->district_name,
    ]);

   $notification = array(
        'message' => 'ShipDistricts Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all#district')->with($notification);


}// End Method



  //Delete District
  public function deleteDistrict($id){

    $district = ShipDistricts::findOrfail($id);

   if(isset($district)){
       $district->delete_status=0;
       $notification = array(
           'message'=>" District Deleted Successfully",
           'alert-type'=>'success'
       );
       if($district->save()){
           return redirect()->back()->with($notification);
       }

   }
}//End method

///////////All State Section/////////
public function allState(){
    $state = ShipState::where('delete_status',1)->latest()->get();
    return view('backend.ship.state.state_all',compact('state'));
} // End Method


public function addState(){

    $division = ShipDivision::orderBy('division_name','ASC')
                               ->where('delete_status',1)
                               ->get();
    $district = ShipDistricts::orderBy('district_name','ASC')
                               ->where('delete_status',1)
                               ->get();
     return view('backend.ship.state.state_add',compact('division','district'));
}// End Method



public function GetDistrict($division_id){
    $dist = ShipDistricts::where('division_id',$division_id)
                        ->where('delete_status',1)
                        ->orderBy('district_name','ASC')
                        ->get();
        return json_encode($dist);

}// End Method

public function StoreState(Request $request){
    $this->stateValidationCkeck($request);

    ShipState::insert([
        'division_id' => $request->division_id,
        'district_id' => $request->district_id,
        'state_name' => $request->state_name,
    ]);

   $notification = array(
        'message' => 'ShipState Inserted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all#state')->with($notification);

}// End Method

public function EditState($id){
    $division = ShipDivision::where('delete_status',1)->orderBy('division_name','ASC')->get();
    $district = ShipDistricts::where('delete_status',1)->orderBy('district_name','ASC')->get();
    $state = ShipState::findOrFail($id);
     return view('backend.ship.state.state_edit',compact('division','district','state'));
}// End Method
public function UpdateState(Request $request){
    $this->stateValidationCkeck($request);
    $state_id = $request->id;
     ShipState::findOrFail($state_id)->update([
        'division_id' => $request->division_id,
        'district_id' => $request->district_id,
        'state_name' => $request->state_name,
    ]);

   $notification = array(
        'message' => 'ShipState Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all#state')->with($notification);


}// End Method

//Delete State
public function DeleteState($id){

    $state = ShipState::findOrfail($id);

   if(isset($state)){
       $state->delete_status=0;
       $notification = array(
           'message'=>" State Deleted Successfully",
           'alert-type'=>'success'
       );
       if($state->save()){
           return redirect()->back()->with($notification);
       }

   }
}//End method

 //Coupon validation
 private function divisionValidationCkeck($request){
    Validator::make($request->all(),[
        'division_name'=>'required|string',



    ])->Validate();
}//End
//District validation
private function districtValidationCkeck($request){
    Validator::make($request->all(),[
        'division_id'=>'required',
        'district_name'=>'required|string',


    ])->Validate();
}//
//State validation
private function stateValidationCkeck($request){
    Validator::make($request->all(),[
        'division_id'=>'required',

        'state_name'=>"required"


    ])->Validate();
}
}
