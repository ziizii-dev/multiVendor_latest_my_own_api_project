<?php

namespace App\Http\Controllers\API\ADMIN;

use App\Models\Seo;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\FileOperations\AdminProfileOperation;

class AdminSiteSettingController extends Controller
{
    //
    public function SiteSetting(){
        $setting = SiteSetting::find(1);
       //return $setting;

       return response()->json([
        "error"=>false,
        "message"=>"Site Setting Data",
        "data"=>$setting,
        "total"=>$setting->count()

       ]);


    } // End Method
    public function SiteSettingUpdate(Request $request){
      // return $request;
        $setting_id = $request->id;
         $this->updateSiteSettingValidationCheck($request);

        if($request->logo == null){
            $data =  SiteSetting::findOrFail($setting_id)->update([
                'support_phone' => $request->support_phone,
                'phone_one' => $request->phone_one,
                'email' => $request->email,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'youtube' => $request->youtube,
                'copyright' => $request->copyright,
             ]);
             return response()->json([
                "error"=>false,
                "message"=>"Site Setting Without Image Successfully",
                "data"=>$data
               ]);
            }else{
                $operation = new AdminProfileOperation( $request->logo,$request->name,'logo');
                $url = $operation->storeImage();
                $data = SiteSetting::findOrFail($setting_id)->update([
                    'support_phone' => $request->support_phone,
                    'phone_one' => $request->phone_one,
                    'email' => $request->email,
                    'company_address' => $request->company_address,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'youtube' => $request->youtube,
                    'copyright' => $request->copyright,
                    'logo' =>$url,
                ]);
                return response()->json([
                    "error"=>false,
                    "message"=>"Site Setting With Image Successfully",
                    "data"=>$data
                   ]);

            };
            }// End Method

            //For seo setting
               public function SeoSetting(){
    $seo = Seo::find(1);
    return response()->json([
        "error"=>false,
        "message"=>"Site Setting Data",
        "data"=>$seo,
        "total"=>$seo->count()

       ]);


} // End Method
public function SeoSettingUpdate(Request $request){
    $seo_id = $request->id;
 $seo = Seo::findOrFail($seo_id)->update([
        'meta_title' => $request->meta_title,
        'meta_author' => $request->meta_author,
        'meta_keyword' => $request->meta_keyword,
        'meta_description' => $request->meta_description,
    ]);
    return response()->json([
        "error"=>false,
        "message"=>"Site Setting Updated Succcessfully",
        "data"=>$seo,


       ]);


}// End Method


            //Validation
            private function updateSiteSettingValidationCheck($request){
                Validator::make($request->all(),[
                    'support_phone' =>"required",
                    'phone_one' => "required",
                    'email' => "required",
                    'company_address' =>"required",
                    'facebook' => "required",
                    'twitter' =>"required",
                    'youtube' =>"required",
                    'copyright' => "required",

                ])->Validate();
             }//End method



}
