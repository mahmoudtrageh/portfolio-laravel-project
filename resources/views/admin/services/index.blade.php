@extends('admin.admin_master')

@section('admin')

    <div class="py-12"> 
   <div class="container">
    <div class="row">


    <div class="col-lg-8">
     <div class="card">




          <div class="card-header"> الخدمات </div>
    

    <table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">الأيقونة</th>
      <th scope="col">العنوان</th>
      <th scope="col">الوصف</th>
      <th scope="col">الوقت</th>
      <th scope="col">الإجراء</th>
    </tr>
  </thead>
  <tbody>
          <!-- @php($i = 1) -->
        @foreach($services as $service) 
    <tr>
      <th scope="row"> {{ $services->firstItem()+$loop->index  }} </th>
      <td> <i class="{{ $service->icon }}"></i> </td>
      <td> {{ $service->title }} </td>
      <td> {{ $service->desc }} </td>
      <td> 
          @if($service->created_at ==  NULL)
          <span class="text-danger"> لا يوجد تاريخ</span> 
          @else
      {{ Carbon\Carbon::parse($service->created_at)->diffForHumans() }}
          @endif
       </td>
       <td> 
       <a href="{{ url('service/edit/'.$service->id) }}" class="btn btn-info">تعديل</a>
       <a href="{{ url('service/delete/'.$service->id) }}" onclick="return confirm('هل أنت متأكد من الحذف')" class="btn btn-danger">حذف</a>
        </td> 


    </tr> 
    @endforeach


  </tbody>
</table>
{{ $services->links() }}
  
       </div>
    </div>


    <div class="col-lg-4 col-md-12">
     <div class="card">
          <div class="card-header"> إضافة خدمة </div>
          <div class="card-body">
          
         
         
          <form action="{{ route('store.service') }}" method="POST">
          @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">الأيقونة</label>
    <input type="text" name="icon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('icon')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">العنوان</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('title')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">الوصف</label>
<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc">

</textarea>
</div>

     
  <button type="submit" class="btn btn-primary">أضف خدمة</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 

 


    </div>
 @endsection
