@extends('admin.admin_master')

@section('admin')

    <div class="py-12"> 
   <div class="container">
    <div class="row">


    <div class="col-lg-8">
     <div class="card">




          <div class="card-header"> الإعدادات </div>
    

    <table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">إسم الموقع</th>
      <th scope="col">اللوجو</th>
      <th scope="col">الأيقونة المصغرة</th>
      <th scope="col">الفيسبوك</th>
      <th scope="col">تويتر</th>
      <th scope="col">انستاغرام</th>
      <th scope="col">يوتيوب</th>
      <th scope="col">لينكدإن</th>
      <th scope="col">github</th>
      <th scope="col">الوقت</th>
      <th scope="col">الإجراء</th>
    </tr>
  </thead>
  <tbody>
          <!-- @php($i = 1) -->
        @foreach($settings as $setting) 
    <tr>
      <th scope="row"> {{ $settings->firstItem()+$loop->index  }} </th>
      <td> {{ $setting->site_name }} </td>
      <td> <img src="{{ asset($setting->logo) }}" style="height:40px; width:70px;" > </td> 
      <td> <img src="{{ asset($setting->favicon) }}" style="height:40px; width:70px;" > </td> 
      <td> {{ $setting->facebook }} </td>
      <td> {{ $setting->twitter }} </td>
      <td> {{ $setting->instagram }} </td>
      <td> {{ $setting->youtube }} </td>
      <td> {{ $setting->linkedin }} </td>
      <td> {{ $setting->github }} </td>
      <td> 
          @if($setting->created_at ==  NULL)
          <span class="text-danger"> لا يوجد تاريخ</span> 
          @else
      {{ Carbon\Carbon::parse($setting->created_at)->diffForHumans() }}
          @endif
       </td>
       <td> 
       <a href="{{ url('settings/edit/'.$setting->id) }}" class="btn btn-info">تعديل</a>
       <a href="{{ url('settings/delete/'.$setting->id) }}" onclick="return confirm('هل أنت متأكد من الحذف')" class="btn btn-danger">حذف</a>
        </td> 


    </tr> 
    @endforeach


  </tbody>
</table>
{{ $settings->links() }}
  
       </div>
    </div>


    <div class="col-lg-4 col-md-12">
     <div class="card">
          <div class="card-header"> إضافة إعداد </div>
          <div class="card-body">
          
         
         
          <form action="{{ route('store.settings') }}" method="POST" enctype="multipart/form-data">
          @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">إسم الموقع</label>
    <input type="text" name="site_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('site_name')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">اللوجو</label>
    <input type="file" name="logo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>

          @error('logo')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">الأيقونة المصغرة</label>
    <input type="file" name="favicon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>

          @error('favicon')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">الفيسبوك</label>
    <input type="text" name="facebook" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('facebook')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">تويتر</label>
    <input type="text" name="twitter" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('twitter')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">إنستاغرام</label>
    <input type="text" name="instagram" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('instagram')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">يوتيوب</label>
    <input type="text" name="youtube" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('youtube')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">لينكدإن</label>
    <input type="text" name="linkedin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('linkedin')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">github</label>
    <input type="text" name="github" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('github')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


     
  <button type="submit" class="btn btn-primary">أضف إعداد</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 

 


    </div>
 @endsection
