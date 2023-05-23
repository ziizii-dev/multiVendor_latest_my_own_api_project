<?php

namespace App\Http\Controllers\API\ADMIN\USER_MANAGE;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserManageController extends Controller
{

    public function AllUser(){

        $userName = Request()->has('name') ? Request()->get('name') : '';
        $users = User::where('delete_status',1)
                           ->where(function ($query) use ($userName) {
                     if (isset($userName)) {
                 $query->where('name', 'LIKE', $userName . '%');

                }
      return $query;
  });

  return response()->json([
      'data' => $users->get(),

      'message' => 'Active User list.',
      'total' => $users->count(),
     // 'page' => (int)$page,
     // 'rowPerPages' => (int)$limit,
  ]);
}//End method
public function AllVendor(){

    $userName = Request()->has('name') ? Request()->get('name') : '';
    $users = Vendor::where(function ($query) use ($userName) {
                 if (isset($userName)) {
             $query->where('name', 'LIKE', $userName . '%');

            }
  return $query;
});

return response()->json([
  'data' => $users->get(),

  'message' => 'Active Vendor list.',
  'total' => $users->count(),
 // 'page' => (int)$page,
 // 'rowPerPages' => (int)$limit,
]);
}
}
