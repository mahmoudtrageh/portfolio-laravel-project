<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Carbon;
use Image;
use Auth;
class PortfolioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    
    public function AllPortfolio(){

        $portfolio = Portfolio::latest()->paginate(5);
        return view('admin.portfolio.index' , compact('portfolio'));
    }


    public function StorePortfolio(Request $request){
        
        $img =  $request->file('img');

        // logo

        $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(300,200)->save('image/portfolio/'.$name_gen);

        $last_img = 'image/portfolio/'.$name_gen;

        Portfolio::insert([
            'name' => $request->name,
            'img' => $last_img,
            'url' => $request->url,
            'tag' => $request->tag,
            'created_at' => Carbon::now()
        ]);
         
        $notification = array(
            'message' => 'تم إنشاء معرض الأعمال بنجاح',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);

    }


    public function Edit($id){
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio.edit',compact('portfolio'));

    }
 

    public function Update(Request $request, $id){

       
        $old_image = $request->old_image;

        $img =  $request->file('img');

         
        if($img){
        // logo
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($img->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/portfolio/';
        $last_img = $up_location.$img_name;
        $img->move($up_location,$img_name);

        $file = public_path('image/portfolio/' . $old_image);

        if( file_exists($file)){
            unlink($old_image);
        }

        Portfolio::find($id)->update([
            'name' => $request->name,
            'img' => $last_img,
            'url' => $request->url,
            'tag' => $request->tag,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'تم تحديث معرض الأعمال بنجاح',
            'alert-type' => 'info'
        );         
        return Redirect()->back()->with($notification);

        }else{
            Portfolio::find($id)->update([
                'name' => $request->name,
            'url' => $request->url,
            'tag' => $request->tag,
            'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'تم تحديث معرض الأعمال بنجاح',
                'alert-type' => 'warning'
            );    
             
            return Redirect()->back()->with($notification);

        } 
    }


     public function Delete($id){
         $image = Portfolio::find($id);
         $old_image = $image->img;
         unlink($old_image);

        Portfolio::find($id)->delete();
        $notification = array(
            'message' => 'تم حذف معرض الأعمال بنجاح',
            'alert-type' => 'error'
        );   
        return Redirect()->back()->with($notification);

     }
}
