@extends('admin.admin_master')

@section('admin')

    <div class="py-12"> 
   <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h4>صفحة السلايدر </h4>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{ route('add.slider') }}"> <button class="btn btn-info">أضف سلايدر</button>  </a>
      </div>
  </div>
    <div class="row mt-3">

      
<br><br>


    <div class="col-md-12">
     <div class="card">


     @if(session('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session('success') }}</strong>  
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
   </div>
   @endif


          <div class="card-header"> الجميع </div>
    

    <table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col" width="5%"># </th>
      <th scope="col" width="15%">عنوان السلايدر</th>
      <th scope="col" width="25%">الوصف</th>
      <th scope="col" width="15%">الصورة</th>
      <th scope="col" width="15%">الإجراء</th>
    </tr>
  </thead>
  <tbody>
          @php($i = 1)
        @foreach($sliders as $slider) 
    <tr>
      <th scope="row"> {{ $i++  }} </th>
      <td> {{ $slider->title }} </td>
      <td> {{ $slider->description }} </td>
      <td> <img src="{{ asset($slider->image) }}" style="height:40px; width:70px;" > </td> 
       
       <td> 
       <a href="{{ url('slider/edit/'.$slider->id) }}" class="btn btn-info">تعديل</a>
       <a href="{{ url('slider/delete/'.$slider->id) }}" onclick="return confirm('هل أنت متأكد من عملية الحذف')" class="btn btn-danger">حذف</a>
        </td> 


    </tr> 
    @endforeach


  </tbody>
</table>
 
  
       </div>
    </div>

 


    </div>
  </div> 

 


    </div>
 @endsection
