<?php

namespace App\Http\Controllers\API\ADMIN\PERMISSION_ROLE;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class AdminPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissionName = Request()->has('name') ? Request()->get('name') : '';
        $permissions = Permission::where('delete_status',1)
                         ->where(function ($query) use ($permissionName) {
                  if (isset($permissionName)) {
                       $query->where('name', 'LIKE', $permissionName . '%');

                      }
            return $query;
        })->get();
        //return $permissions;
        return response()->json([
           "error"=>false,
           "message"=>"Permission Role Lists",
           "data"=>$permissions,
           "total"=>$permissions->count()

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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->permissionValidationCkeck($request);
        $role = Permission::create([
             'name'=>$request->name,
             'group_name'=>$request->group_name,

         ]);
         //return $role;

         return response()->json([
            "error"=>false,
            "message"=>'Permission Inserted Successfully',
            "data"=>$role
         ]);

    }//end method

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
        // return $request;
        $this->permissionValidationCkeck($request);
        // $permission_id = $request->id;
        $role = Permission::findOrFail($id)->update([
            'name'=>$request->name,
            'group_name'=>$request->group_name,
        ]);
        return response()->json([
            "error"=>false,
            "message"=>'Permission Updated Successfully',
            "data"=>$role
         ]);


        // return redirect()->route('all.permission')->with($notification);
    }//End method

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrfail($id);

        if(isset($permission)){
            $permission->delete_status=0;

            if($permission->save()){
                return response()->json([
                    "error"=>false,
                    "message"=>'Permission Deleted Successfully',

                 ]);

            }

        }
    }
    //Permissin Validation
    private function permissionValidationCkeck($request){
        Validator::make($request->all(),[
            'name'=>'required',
            'group_name'=>'required',

        ])->Validate();
    }//End Method
}
