<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Carbon;
use Auth;
class ServiceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    
    public function AllService(){

        $services = Service::latest()->paginate(5);
        return view('admin.services.index' , compact('services'));
    }


    public function StoreService(Request $request){
        
        Service::insert([
            'icon' => $request->icon,
            'title' => $request->title,
            'desc' => $request->desc,
            'created_at' => Carbon::now()
        ]);
         
        $notification = array(
            'message' => 'تم إنشاء الخدمات بنجاح',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);

    }


    public function Edit($id){
        $services = Service::find($id);
        return view('admin.services.edit',compact('services'));

    }
 

    public function Update(Request $request, $id){


        Service::find($id)->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'desc' => $request->desc,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'تم تحديث الخدمات بنجاح',
            'alert-type' => 'info'
        );         
        return Redirect()->back()->with($notification);

       
    }


     public function Delete($id){
       
        Service::find($id)->delete();
        $notification = array(
            'message' => 'تم حذف الخدمة بنجاح',
            'alert-type' => 'error'
        );   
        return Redirect()->back()->with($notification);

     }
}
