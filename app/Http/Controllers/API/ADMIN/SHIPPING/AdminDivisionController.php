<?php

namespace App\Http\Controllers\API\ADMIN\SHIPPING;

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
class AdminDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisionName = Request()->has('division_name') ? Request()->get('division_name') : '';
        $divisions = ShipDivision ::where('delete_status',1)
                         ->where(function ($query) use ($divisionName) {
                  if (isset($divisionName)) {
                       $query->where('division_name', 'LIKE', $divisionName . '%');

                      }
            return $query;
        });

        return response()->json([
            'data' => $divisions->get(),
            'message' => 'Division list.',
            'total' => $divisions->count(),
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
    }//End method

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->divisionValidationCkeck($request);
        $data = ShipDivision::insert([
            'division_name'=>$request->division_name,
            "created_at"=>Carbon::now()


         ]);
         $notification = array(
            'message'=>"Division inserted Successfully",
            'alert-type'=>'success'
        );
        return response()->json([
            "error"=>false,
            "message"=>"Create Shipping Division Success.",
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
       // $division_id = $request->id;
        $this->divisionValidationCkeck($request);
       $data = ShipDivision::findOrFail($id)->update([
       'division_name'=>$request->division_name,
    ]);
    return response()->json([
        "error"=>false,
        "message"=>"Create Shipping Division Success.",
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
    $division = ShipDivision::findOrfail($id);
    if(isset($division)){
        $division->delete_status=0;
        if($division->save()){
            return response()->json([
                "error"=>false,
                "message"=>" Shipping Division Deleted Success.",
                "data"=>$division
               ]);

        }

    }
    }
    //Coupon validation
 private function divisionValidationCkeck($request){
    Validator::make($request->all(),[
        'division_name'=>'required|string',
    ])->Validate();
}//End
}
