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
          <div class="card-header"> تعديل التواصل </div>
          <div class="card-body">
          
         
         
     <form action="{{ url('contact/update/'.$contacts->id)  }}" method="POST">
          @csrf 
  <div class="form-group">
    <label for="exampleInputEmail1">تعديل البريد الإلكتروني</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $contacts->email }}">

          @error('email')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">تعديل الهاتف</label>
    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $contacts->phone }}">

          @error('phone')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">العنوان</label>
<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address">
{{ $contacts->address }}
</textarea>
</div>

     
  <button type="submit" class="btn btn-primary">تحديث التواصل</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 

    </div>
    
    @endsection
