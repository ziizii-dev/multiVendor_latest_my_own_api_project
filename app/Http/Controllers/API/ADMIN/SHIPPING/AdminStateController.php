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
use App\Http\Resources\ShipStateResource;
use Illuminate\Support\Facades\Validator;

class AdminStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stateName = Request()->has('state_name') ? Request()->get('state_name') : '';
        $states = ShipState::where('delete_status',1)
                         ->where(function ($query) use ($stateName) {
                  if (isset($stateName)) {
                       $query->where('state_name', 'LIKE', $stateName . '%');
                      }
            return $query;
        })->get();
        $state = ShipStateResource::collection($states);
        //return $state;

        return response()->json([
            'data' => $state,
            'message' => 'Shipping states list.',
            'total' => $states->count(),
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
        $this->stateValidationCkeck($request);
   $data = ShipState::insert([
        'division_id' => $request->division_id,
        'district_id' => $request->district_id,
        'state_name' => $request->state_name,
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
        $this->stateValidationCkeck($request);
      //  $state_id = $request->id;
        $data = ShipState::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
        ]);
        return response()->json([
            "error"=>false,
            "message"=>" Shipping State Updated Success.",
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
        $state = ShipState::findOrfail($id);
        if(isset($state)){
            $state->delete_status=0;

            if($state->save()){
                return response()->json([
                    "error"=>false,
                    "message"=>" Shipping State Deleted Success.",
                    "data"=>$state
                   ]);
            }

        }
    }//End method
    //State validation
private function stateValidationCkeck($request){
    Validator::make($request->all(),[
        'division_id'=>'required',
        'state_name'=>"required"
    ])->Validate();
}//End method
}
