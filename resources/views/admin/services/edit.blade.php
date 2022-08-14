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
          <div class="card-header"> تعديل الخدمات </div>
          <div class="card-body">
          
         
         
     <form action="{{ url('service/update/'.$services->id)  }}" method="POST">
          @csrf 
  <div class="form-group">
    <label for="exampleInputEmail1">تعديل الأيقونة</label>
    <input type="text" name="icon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $services->icon }}">

          @error('icon')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">تعديل العنوان</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $services->title }}">

          @error('title')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">الوصف</label>
<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc">
{{ $services->desc }}
</textarea>
</div>

     
  <button type="submit" class="btn btn-primary">تحديث الخدمة</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 

    </div>
    
    @endsection
