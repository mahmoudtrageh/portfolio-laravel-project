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
          <div class="card-header"> تعديل معرض الأعمال </div>
          <div class="card-body">
          
         
         
     <form action="{{ url('portfolio/update/'.$portfolio->id)  }}" method="POST" enctype="multipart/form-data">
          @csrf 
   <input type="hidden" name="old_image" value="{{ $portfolio->img }}">
  <div class="form-group">
    <label for="exampleInputEmail1">تعديل الإسم</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $portfolio->name }}">

          @error('name')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">تحديث الصورة</label>
    <input type="file" name="img" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $portfolio->img }}">

          @error('img')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


     <div class="form-group">
     <img src="{{ asset($portfolio->img) }}" style="width:400px; height:200px;" >

     </div>

     <div class="form-group">
      <label for="exampleInputEmail1">الرابط</label>
      <input type="text" name="url" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $portfolio->url }}">
  
            @error('url')
                 <span class="text-danger"> {{ $message }}</span>
            @enderror
  
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">التسمية</label>
      <input type="text" name="tag" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $portfolio->tag }}">
  
            @error('tag')
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
