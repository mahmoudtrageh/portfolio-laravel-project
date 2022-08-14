@extends('admin.admin_master')

@section('admin')


    @if(session('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session('success') }}</strong>  
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
   </div>
   @endif

    <div class="py-12"> 
   <div class="container">
    <div class="row">

 


    <div class="col-md-8">
     <div class="card">
          <div class="card-header"> تعديل الإعدادات </div>
          <div class="card-body">
          
         
         
     <form action="{{ url('settings/update/'.$settings->id)  }}" method="POST" enctype="multipart/form-data">
          @csrf 
   <input type="hidden" name="old_image" value="{{ $settings->logo }}">
   <input type="hidden" name="old_favicon" value="{{ $settings->favicon }}">
  <div class="form-group">
    <label for="exampleInputEmail1">تعديل إسم الموقع</label>
    <input type="text" name="site_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $settings->site_name }}">

          @error('site_name')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">تحديث اللوجو</label>
    <input type="file" name="logo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $settings->logo }}">

          @error('logo')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


     <div class="form-group">
     <img src="{{ asset($settings->logo) }}" style="width:400px; height:200px;" >

     </div>


     <div class="form-group">
      <label for="exampleInputEmail1">تحديث الأيقونة المصغرة</label>
      <input type="file" name="favicon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $settings->favicon }}">
  
            @error('favicon')
                 <span class="text-danger"> {{ $message }}</span>
            @enderror
  
    </div>
  
  
       <div class="form-group">
       <img src="{{ asset($settings->favicon) }}" style="width:100px; height:100px;" >
  
       </div>

     <div class="form-group">
      <label for="exampleInputEmail1">الفيسبوك</label>
      <input type="text" name="facebook" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $settings->facebook }}">
  
            @error('facebook')
                 <span class="text-danger"> {{ $message }}</span>
            @enderror
  
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">تويتر</label>
      <input type="text" name="twitter" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $settings->twitter }}">
  
            @error('twitter')
                 <span class="text-danger"> {{ $message }}</span>
            @enderror
  
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">انستاغرام</label>
      <input type="text" name="instagram" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $settings->instagram }}">
  
            @error('instagram')
                 <span class="text-danger"> {{ $message }}</span>
            @enderror
  
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">يوتيوب</label>
      <input type="text" name="youtube" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $settings->youtube }}">
  
            @error('youtube')
                 <span class="text-danger"> {{ $message }}</span>
            @enderror
  
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">لينكد إن</label>
      <input type="text" name="linkedin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $settings->linkedin }}">
  
            @error('linkedin')
                 <span class="text-danger"> {{ $message }}</span>
            @enderror
  
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">github</label>
      <input type="text" name="github" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $settings->github }}">
  
            @error('github')
                 <span class="text-danger"> {{ $message }}</span>
            @enderror
  
    </div>


     
  <button type="submit" class="btn btn-primary">تحديث الإعدادات</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 

    </div>
    
    @endsection
