<?php

namespace App\Http\Controllers\Backend;

use Image;
use App\Models\Seo;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteSettingController extends Controller
{
    public function SiteSetting(){
        $setting = SiteSetting::find(1);
        return view('backend.setting.setting_update',compact('setting'));

    } // End Method
    //Update sitesetting
    public function SiteSettingUpdate(Request $request){
// return $request;
        $setting_id = $request->id;
        if ($request->file('logo')) {
        $image = $request->file('logo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(180,56)->save('upload/logo/'.$name_gen);
        $save_url = 'upload/logo/'.$name_gen;
        SiteSetting::findOrFail($setting_id)->update([
            'support_phone' => $request->support_phone,
            'phone_one' => $request->phone_one,
            'email' => $request->email,
            'company_address' => $request->company_address,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'copyright' => $request->copyright,
            'logo' => $save_url,
        ]);
       $notification = array(
            'message' => 'Site Setting Updated with image Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        } else {
            SiteSetting::findOrFail($setting_id)->update([
            'support_phone' => $request->support_phone,
            'phone_one' => $request->phone_one,
            'email' => $request->email,
            'company_address' => $request->company_address,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'copyright' => $request->copyright,
        ]);

       $notification = array(
            'message' => 'Site Setting Updated without image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        } // end else

    }// End Method
//For seo setting
public function SeoSetting(){
    $seo = Seo::find(1);
    return view('backend.seo.seo_update',compact('seo'));

} // End Method

public function SeoSettingUpdate(Request $request){
    $seo_id = $request->id;
 Seo::findOrFail($seo_id)->update([
        'meta_title' => $request->meta_title,
        'meta_author' => $request->meta_author,
        'meta_keyword' => $request->meta_keyword,
        'meta_description' => $request->meta_description,
    ]);

   $notification = array(
        'message' => 'Seo Setting Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}// End Method










    //Validation
// private function settingValidationCheck($request){
//     Validator::make($request->all(),[
//         'support_phone'=>'required',
//         'phone_one'=>'required',
//         'email'=>'required',
//         'company_address'=>'required',
//         'facebook'=>'required',
//         'twitter'=>'required',
//         'facebook'=>'required',
//         'logo'=>'mimes:jpeg,jpg,png,webp,gif'

//     ])->Validate();
//  }//End Method

}
