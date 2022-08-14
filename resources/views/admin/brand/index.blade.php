@extends('admin.admin_master')

@section('admin')

    <div class="py-12"> 
   <div class="container">
    <div class="row">


    <div class="col-lg-8">
     <div class="card">




          <div class="card-header"> جميع البراندات </div>
    

    <table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">إسم البراند</th>
      <th scope="col">صورة البراند</th>
      <th scope="col">الوقت</th>
      <th scope="col">الإجراء</th>
    </tr>
  </thead>
  <tbody>
          <!-- @php($i = 1) -->
        @foreach($brands as $brand) 
    <tr>
      <th scope="row"> {{ $brands->firstItem()+$loop->index  }} </th>
      <td> {{ $brand->brand_name }} </td>
      <td> <img src="{{ asset($brand->brand_image) }}" style="height:40px; width:70px;" > </td> 
      <td> 
          @if($brand->created_at ==  NULL)
          <span class="text-danger"> لا يوجد تاريخ</span> 
          @else
      {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
          @endif
       </td>
       <td> 
       <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-info">تعديل</a>
       <a href="{{ url('brand/delete/'.$brand->id) }}" onclick="return confirm('هل أنت متأكد من الحذف')" class="btn btn-danger">حذف</a>
        </td> 


    </tr> 
    @endforeach


  </tbody>
</table>
{{ $brands->links() }}
  
       </div>
    </div>


    <div class="col-lg-4 col-md-12">
     <div class="card">
          <div class="card-header"> أضف براند </div>
          <div class="card-body">
          
         
         
          <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
          @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">إسم البراند</label>
    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('brand_name')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">صورة البراند</label>
    <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>

          @error('brand_image')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>



     
  <button type="submit" class="btn btn-primary">أضف</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 

 


    </div>
 @endsection
