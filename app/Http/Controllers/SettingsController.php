<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Carbon;
use Image;
use Auth;
class SettingsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    
    public function AllSettings(){

        $settings = Setting::latest()->paginate(5);
        return view('admin.settings.index' , compact('settings'));
    }


    public function StoreSettings(Request $request){
        
        $logo =  $request->file('logo');
        $favicon =  $request->file('favicon');

        // logo

        $name_gen = hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();
        Image::make($logo)->resize(300,200)->save('image/settings/'.$name_gen);

        $last_img = 'image/settings/'.$name_gen;

        // favicon

        $name_gen_favicon = hexdec(uniqid()).'.'.$favicon->getClientOriginalExtension();
        Image::make($favicon)->resize(300,200)->save('image/settings/'.$name_gen_favicon);

        $last_img_favicon = 'image/settings/'.$name_gen_favicon;
 
        Setting::insert([
            'site_name' => $request->site_name,
            'logo' => $last_img,
            'favicon' => $last_img_favicon,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'linkedin' => $request->linkedin,
            'github' => $request->github,
            'created_at' => Carbon::now()
        ]);
         
        $notification = array(
            'message' => 'تم إنشاء الإعدادات بنجاح',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);

    }


    public function Edit($id){
        $settings = Setting::find($id);
        return view('admin.settings.edit',compact('settings'));

    }
 

    public function Update(Request $request, $id){

       
        $old_image = $request->old_image;
        $old_favicon = $request->old_favicon;

        $logo =  $request->file('logo');
        $favicon =  $request->file('favicon');

         
        if($logo || $favicon){
        // logo
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($logo->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/settings/';
        $last_img = $up_location.$img_name;
        $logo->move($up_location,$img_name);

        unlink($old_image);

        // favicon

        $name_gen_favicon = hexdec(uniqid());
        $img_ext_favicon = strtolower($favicon->getClientOriginalExtension());
        $img_name_favicon = $name_gen_favicon.'.'.$img_ext_favicon;
        $up_location_favicon = 'image/settings/';
        $last_img_favicon = $up_location_favicon.$img_name_favicon;
        $favicon->move($up_location_favicon,$img_name_favicon);

        unlink($old_favicon);

        Setting::find($id)->update([
            'site_name' => $request->site_name,
            'logo' => $last_img,
            'favicon' => $last_img_favicon,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'linkedin' => $request->linkedin,
            'github' => $request->github,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'تم تحديث الإعدادات بنجاح',
            'alert-type' => 'info'
        );         
        return Redirect()->back()->with($notification);

        }else{
            Setting::find($id)->update([
                'site_name' => $request->site_name,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'linkedin' => $request->linkedin,
            'github' => $request->github,
            'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'تم تحديث الإعدادات بنجاح',
                'alert-type' => 'warning'
            );    
             
            return Redirect()->back()->with($notification);

        } 
    }


     public function Delete($id){
         $image = Setting::find($id);
         $old_image = $image->logo;
         unlink($old_image);

        Setting::find($id)->delete();
        $notification = array(
            'message' => 'تم حذف الإعدادات بنجاح',
            'alert-type' => 'error'
        );   
        return Redirect()->back()->with($notification);

     }

}
