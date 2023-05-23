<?php

namespace App\Http\Controllers\API\ADMIN\PERMISSION_ROLE;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleName = Request()->has('name') ? Request()->get('name') : '';
        $roles = Role::where('delete_status',1)
                         ->where(function ($query) use ($roleName) {
                  if (isset($roleName)) {
                       $query->where('name', 'LIKE', $roleName . '%');

                      }
            return $query;
        })->get();
        //return $roles;
        return response()->json([
           "error"=>false,
           "message"=>"Admin Role Lists",
           "data"=>$roles,
           "total"=>$roles->count()

        ]);
        //////////////////
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
        //   return $request;
     $this->roleValidationCheck($request);
   $data = Role::create([
       'name' => $request->name,
   ]);
// return $data;
   return response()->json([
    "error"=>false,
    "message"=>"Roles Inserted Successfully",
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
        // return $id;
        $this->roleValidationCheck($request);
        // $role_id = $request->id;
       $data = Role::findOrFail($id)->update([
            'name' => $request->name,
        ]);
        return response()->json([
            "error"=>false,
            "message"=>"Roles Updated Successfully",
            "data"=>$data
           ]);
        // $notification = array(
        //     'message' => 'Roles Updated Successfully',
        //     'alert-type' => 'success'
        // );

    }//End method

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        $roles = Role::findOrfail($id);
        if(isset($roles)){
            $roles->delete_status=0;
            if($roles->save()){
                return response()->json([
                    "error"=>false,
                    "message"=>'Admin Role Deleted Successfully',
                    "data"=>true

                 ]);
            }

        }
    }//End method
    ///Add Role in Permission
public function AddRolesPermission(){
    $permission_groups = User::getpermissionGroups();
    // return $permission_groups;
    return response()->json([
        "error"=>false,
        "message"=>'Group Permission Lists',
        "data"=>$permission_groups

     ]);

}// End Method

//Store Role in Permission
public function RolePermissionStore(Request $request){
    //  return  DB::table('role_has_permissions')->where('role_id',5)->count();
    $data = [];
    $permissions = $request->permission;
    //  return $permissions;

    foreach($permissions as $key => $item){
        $data['role_id'] = $request->role_id;
        $data['permission_id'] = $item;
        //return $data ;
        DB::table('role_has_permissions')->insert($data);

    }
    return response()->json([
        "error"=>false,
        "message"=>'Role Permission Added Successfully',
        "data"=>true

     ]);

}// End Method

//Update Role permission
public function AdminRolesPermissionUpdate(Request $request,$id){
         //return "hello";
    $role = Role::where("id",$request->id)->first();
    // return $role;
    $permissions = $request->permission;
    // return $permissions;
    if (!empty($permissions)){
       $role->syncPermissions($permissions);
    }
    return response()->json([
        "error"=>false,
        "message"=>'Role Permission Updated Successfully',
        "data"=>true

     ]);
}// End Method

private function roleValidationCheck($request){
    Validator::make($request->all(),[
        'name'=>'required'
    ])->Validate();
}//End validation
}
