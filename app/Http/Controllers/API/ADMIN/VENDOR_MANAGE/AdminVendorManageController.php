<?php

namespace App\Http\Controllers\API\ADMIN\VENDOR_MANAGE;

use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminVendorManageController extends Controller
{

    //Active Vendor
    public function activeVendor(){
        $vendorName = Request()->has('name') ? Request()->get('name') : '';
        $vendors = Vendor::where('status','active')->where('role','vendor')->latest()
                           ->where(function ($query) use ($vendorName) {
                     if (isset($vendorName)) {
                 $query->where('name', 'LIKE', $vendorName . '%');

                }
      return $query;
  });

  return response()->json([
      'data' => $vendors->get(),
      'message' => 'Active Vendor list.',
      'total' => $vendors->count(),
     // 'page' => (int)$page,
     // 'rowPerPages' => (int)$limit,
  ]);
    }//End Method

    //InActive Vendor Approve
    public function inactiveVendorApprove(Request $request){
        //return "Hello";
        $invendor_id = $request->id;
        //return $invendor_id;
        $user = Vendor::findOrFail($invendor_id)->update([
            'status'=>'inactive',
        ]);

       return response()->json([
        "error"=>"false",
        "message"=>"Vendor Inactive Successfully",

       ]);

    } //End method

     //Inactive Vendor
     public function inactiveVendor(){
        $invendorName = Request()->has('name') ? Request()->get('name') : '';
        $invendors = Vendor::where('status','inactive')->where('role','vendor')->latest()
                           ->where(function ($query) use ($invendorName) {
                     if (isset($invendorName)) {
                 $query->where('name', 'LIKE', $invendorName . '%');

                }
      return $query;
  });

  return response()->json([
      'data' => $invendors->get(),
      'message' => 'Inactive Vendor list.',
      'total' => $invendors->count(),
     // 'page' => (int)$page,
     // 'rowPerPages' => (int)$limit,
  ]);
    }//End Method

   //InActive Vendor Approve
   public function activeVendorApprove(Request $request){
    //return "Hello";
    $vendor_id = $request->id;
    //return $invendor_id;
    $user = Vendor::findOrFail($vendor_id)->update([
        'status'=>'active',
    ]);

   return response()->json([
    "error"=>"false",
    "message"=>"Vendor Active Approved Successfully",

   ]);

} //End method
}
