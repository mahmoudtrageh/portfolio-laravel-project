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
          <div class="card-header"> تعديل التقييم </div>
          <div class="card-body">
          
         
         
     <form action="{{ url('testmonial/update/'.$testmonials->id)  }}" method="POST">
          @csrf 
  <div class="form-group">
    <label for="exampleInputEmail1">تعديل المستخدم</label>
    <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $testmonials->user }}">

          @error('user')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">تعديل الوظيفة</label>
    <input type="text" name="job" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $testmonials->job }}">

          @error('job')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">النص</label>
<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text">
{{ $testmonials->text }}
</textarea>
</div>

     
  <button type="submit" class="btn btn-primary">تحديث التقييم</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 

    </div>
    
    @endsection
