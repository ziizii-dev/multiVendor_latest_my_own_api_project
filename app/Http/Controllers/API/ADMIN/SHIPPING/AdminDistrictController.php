<?php

namespace App\Http\Controllers\API\ADMIN\SHIPPING;

use Image;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Category;
use App\Models\ShipState;
use App\Models\ShipDivision;
use Illuminate\Http\Request;
use App\Models\ShipDistricts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ShipDistrictResource;

class AdminDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districtName = Request()->has('district_name') ? Request()->get('district_name') : '';
        $districts = ShipDistricts::where('delete_status',1)
                         ->where(function ($query) use ($districtName) {
                  if (isset($districtName)) {
                       $query->where('district_name', 'LIKE', $districtName . '%');

                      }
            return $query;
        })->get();
        $district = ShipDistrictResource::collection($districts);
       // return $district;

        return response()->json([
            'data' => $district,
            'message' => 'Shipping Districts list.',
            'total' => $districts->count(),
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
        $this->districtValidationCkeck($request);
    $data = ShipDistricts::insert([
            'division_id'=>$request->division_id,
            'district_name'=>$request->district_name,
            "created_at"=>Carbon::now()
         ]);

        return response()->json([
            "error"=>false,
            "message"=>"Create Shipping District Success.",
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
        $this->districtValidationCkeck($request);
        //$district_id = $request->id;
         $data = ShipDistricts::findOrFail($id)->update([
             'division_id' => $request->division_id,
            'district_name' => $request->district_name,
        ]);
        return response()->json([
            "error"=>false,
            "message"=>" Shipping District Updated Success.",
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
        $district = ShipDistricts::findOrfail($id);
   if(isset($district)){
       $district->delete_status=0;

       if($district->save()){
        return response()->json([
            "error"=>false,
            "message"=>" Shipping District Deleted Success.",
            "data"=>$district
           ]);
       }

   }
    }//End method
    //District validation
private function districtValidationCkeck($request){
    Validator::make($request->all(),[
        'division_id'=>'required',
        'district_name'=>'required|string',

    ])->Validate();
}//
}
