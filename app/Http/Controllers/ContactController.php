<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    
 public function AdminContact(){
     $contacts = Contact::latest()->paginate(5);
     return view('admin.contact.index',compact('contacts'));
 }

 public function AdminAddContact(){
     return view('admin.contact.create');
 }

 public function AdminStoreContact(Request $request){
   
    Contact::insert([
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'created_at' => Carbon::now()
    ]);

    return Redirect()->route('admin.contact')->with('success','تم إضافة التواصل بنجاح');

 }

 public function Edit($id){
    $contacts = Contact::find($id);
    return view('admin.contact.edit',compact('contacts'));

}


public function Update(Request $request, $id){


    Contact::find($id)->update([
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'created_at' => Carbon::now()
    ]);

    $notification = array(
        'message' => 'تم تحديث التواصل بنجاح',
        'alert-type' => 'info'
    );         
    return Redirect()->back()->with($notification);

   
}


 public function Delete($id){
   
    Contact::find($id)->delete();
    $notification = array(
        'message' => 'تم حذف التواصل بنجاح',
        'alert-type' => 'error'
    );   
    return Redirect()->back()->with($notification);

 }
 

    public function Contact(){
        $contacts = DB::table('contacts')->first();
        return view('home',compact('contacts'));
    }


    public function ContactForm(Request $request){
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
    
        return Redirect()->route('contact')->with('success','تم إرسال رسالتك بنجاح');

    }

    public function AdminMessage(){
        $messages = ContactForm::latest()->paginate(5);
        return view('admin.contact.message',compact('messages'));
    }



}
