@extends('admin.admin_master')

@section('admin')

    <div class="py-12"> 
   <div class="container">
    <div class="row">


    <div class="col-lg-8">
     <div class="card">




          <div class="card-header"> التقييمات </div>
    

    <table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">المستخدم</th>
      <th scope="col">الوظيفة</th>
      <th scope="col">النص</th>
      <th scope="col">الوقت</th>
      <th scope="col">الإجراء</th>
    </tr>
  </thead>
  <tbody>
          <!-- @php($i = 1) -->
        @foreach($testmonials as $testmonial) 
    <tr>
      <th scope="row"> {{ $testmonials->firstItem()+$loop->index  }} </th>
      <td>{{$testmonial->user}} </td>
      <td> {{ $testmonial->job }} </td>
      <td> {{ $testmonial->text }} </td>
      <td> 
          @if($testmonial->created_at ==  NULL)
          <span class="text-danger"> لا يوجد تاريخ</span> 
          @else
      {{ Carbon\Carbon::parse($testmonial->created_at)->diffForHumans() }}
          @endif
       </td>
       <td> 
       <a href="{{ url('testmonial/edit/'.$testmonial->id) }}" class="btn btn-info">تعديل</a>
       <a href="{{ url('testmonial/delete/'.$testmonial->id) }}" onclick="return confirm('هل أنت متأكد من الحذف')" class="btn btn-danger">حذف</a>
        </td> 


    </tr> 
    @endforeach


  </tbody>
</table>
{{ $testmonials->links() }}
  
       </div>
    </div>


    <div class="col-lg-4 col-md-12">
     <div class="card">
          <div class="card-header"> إضافة تقييم </div>
          <div class="card-body">
          
         
         
          <form action="{{ route('store.testmonial') }}" method="POST">
          @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">المستخدم</label>
    <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('user')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">الوظيفة</label>
    <input type="text" name="job" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('job')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">النص</label>
<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text">

</textarea>
</div>

     
  <button type="submit" class="btn btn-primary">أضف تقييم</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 

 


    </div>
 @endsection
