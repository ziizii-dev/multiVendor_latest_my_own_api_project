<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    //Roel permission
    public function AllPermission(){
        $permissions =Permission::where('delete_status',1)->get();
        return view ('backend.pages.permission.all_permission',compact('permissions'));


    }//End method

//     //Add Permission
    public function AddPermission(){
        return view ('backend.pages.permission.add_permission');

    }//End method

    //Store Permission
    public function StorePermission(Request $request){
        $this->permissionValidationCkeck($request);
       $role = Permission::create([
            'name'=>$request->name,
            'group_name'=>$request->group_name,

        ]);
        $notification =([
            "message"=>"Permission Inserted Successfully",
            'alert-type'=>"success"
        ]);

        return redirect()->route('all.permission')->with($notification);


    }//End method

    //Edit Permission
    public function EditPermission($id){
        $permission = Permission::findOrfail($id);
        return view ('backend.pages.permission.edit_permission',compact('permission'));

    }//End metod

    //Update Permission
    public function UpdatePermission(Request $request){
        $this->permissionValidationCkeck($request);
        $permission_id = $request->id;
        $role = Permission::findOrFail($permission_id)->update([
            'name'=>$request->name,
            'group_name'=>$request->group_name,
        ]);
        $notification =([
            "message"=>"Permission Updated Successfully",
            'alert-type'=>"success"
        ]);

        return redirect()->route('all.permission')->with($notification);

    }//End method

    //Delete Permission
public function DeletePermission($id){

    $permission = Permission::findOrfail($id);

   if(isset($permission)){
       $permission->delete_status=0;
       $notification = array(
           'message'=>"Deleted Successfully",
           'alert-type'=>'success'
       );
       if($permission->save()){
           return redirect()->back()->with($notification);
       }

   }
}//End Method

//For All Roles
public function AllRoles(){
    $roles = Role::where('delete_status',1)->get();
    return view('backend.pages.roles.all_roles',compact('roles'));

} // End Method
//Add Role
public function AddRoles(){
    return view('backend.pages.roles.add_roles');
}// End Method

//Store Roles
public function StoreRoles(Request $request){
    // return "hello";
    $this->roleValidationCheck($request);
     Role::create([
        'name' => $request->name,
    ]);
    $notification = array(
        'message' => 'Roles Inserted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.roles')->with($notification);


}// End Method
//Edit Role
public function EditRoles($id){
    $roles = Role::findOrFail($id);
    return view('backend.pages.roles.edit_roles',compact('roles'));
}// End Method

//Update Role

public function UpdateRoles(Request $request){
    $this->roleValidationCheck($request);
    $role_id = $request->id;
    Role::findOrFail($role_id)->update([
        'name' => $request->name,

    ]);
    $notification = array(
        'message' => 'Roles Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.roles')->with($notification);

}// End Method




 //Delete All Roles
//  public function DeleteRoles($id){
//     $roels = Role::findOrFail($id);
//     if(isset($roles)){
//         $roles->delete_status = 0;
//         $notification=[
//             'message'=>"Deleted Successfully",
//            'alert-type'=>'success'
//         ];
//         if($roles->save()){
//             return redirect()->back()->with($notification);
//         }

//     }

//  }//End
public function DeleteRoles($id){

    $roles = Role::findOrfail($id);

   if(isset($roles)){
       $roles->delete_status=0;
       $notification = array(
           'message'=>"Deleted Successfully",
           'alert-type'=>'success'
       );
       if($roles->save()){
           return redirect()->back()->with($notification);
       }

   }
}//End Method


///Add Role in Permission
public function AddRolesPermission(){
    $roles = Role::where('delete_status',1)->get();
    $permissions = Permission::where('delete_status',1)->get();
    $permission_groups = User::getpermissionGroups();
    return view('backend.pages.roles.add_roles_permission',compact('roles','permissions','permission_groups'));
}// End Method
//Store Role in Permission
public function RolePermissionStore(Request $request){
    $data = [];
    $permissions = $request->permission;
    // return $permissions;

    foreach($permissions as $key => $item){
        $data['role_id'] = $request->role_id;
        $data['permission_id'] = $item;
        //  return $data;
         DB::table('role_has_permissions')->insert($data);
    }

     $notification = array(
        'message' => 'Role Permission Added Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.roles')->with($notification);

}// End Method

//All Role Permisssion
public function AllRolesPermission(){
    $roles = Role::where('delete_status',1)->get();
    return view('backend.pages.roles.all_roles_permission',compact('roles'));

} // End Method

//Edit Role Permission
public function AdminRolesEdit($id){
    $role = Role::findOrFail($id);
    $permissions = Permission::where('delete_status',1)->get();
    $permission_groups = User::getpermissionGroups();
    return view('backend.pages.roles.role_permission_edit',compact('role','permissions','permission_groups'));
} // End Method

//Update Role permission
public function AdminRolesUpdate(Request $request,$id){
    $role = Role::findOrFail($id);
    $permissions = $request->permission;
    if (!empty($permissions)){
       $role->syncPermissions($permissions);
    }

     $notification = array(
        'message' => 'Role Permission Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.roles.permission')->with($notification);

}// End Method

//Delete AdminRoles
public function AdminRolesDelete($id){
    $role = Role::findOrFail($id);
    if (!is_null($role)) {
        $role->delete_status = 0;
        $notification = array(
            'message'=>"Deleted Successfully",
            'alert-type'=>'success');
            if($role->save()){
                return redirect()->back()->with($notification);
            }
    }

}// End Method
//Permissin Validation
     private function permissionValidationCkeck($request){
        Validator::make($request->all(),[
            'name'=>'required',
            'group_name'=>'required',

        ])->Validate();
    }//End Method

private function roleValidationCheck($request){
    Validator::make($request->all(),[
        'role_id'=>'required'
    ])->Validate();
}//End validation


}
