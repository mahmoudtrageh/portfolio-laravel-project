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
          <div class="card-header"> تعديل السلايدر </div>
          <div class="card-body">
          
         
         
     <form action="{{ url('slider/update/'.$sliders->id)  }}" method="POST" enctype="multipart/form-data">
          @csrf 
   <input type="hidden" name="old_image" value="{{ $sliders->image }}">
  <div class="form-group">
    <label for="exampleInputEmail1">تعديل العنوان</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $sliders->title }}">

          @error('title')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">تحديث الصورة</label>
    <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $sliders->image }}">

          @error('image')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


     <div class="form-group">
     <img src="{{ asset($sliders->image) }}" style="width:400px; height:200px;" >

     </div>

     <div class="form-group">
          <label for="exampleFormControlTextarea1">الوصف</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">
      {{ $sliders->description }}
      </textarea>
      </div>

  <button type="submit" class="btn btn-primary">تحديث السلايدر</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 

    </div>
    
    @endsection
