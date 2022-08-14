@extends('admin.admin_master')

@section('admin')

    <div class="py-12"> 
   <div class="container">
    <div class="row">


    <div class="col-lg-8">
     <div class="card">




          <div class="card-header"> معرض الأعمال </div>
    

    <table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">الإسم</th>
      <th scope="col">الصورة</th>
      <th scope="col">الرابط</th>
      <th scope="col">التسمية</th>
      <th scope="col">الوقت</th>
      <th scope="col">الإجراء</th>
    </tr>
  </thead>
  <tbody>
          <!-- @php($i = 1) -->
        @foreach($portfolio as $item) 
    <tr>
      <th scope="row"> {{ $portfolio->firstItem()+$loop->index  }} </th>
      <td> {{ $item->name }} </td>
      <td> <img src="{{ asset($item->img) }}" style="height:40px; width:70px;" > </td> 
      <td> {{ $item->url }} </td>
      <td> {{ $item->tag }} </td>
      <td> 
          @if($item->created_at ==  NULL)
          <span class="text-danger"> لا يوجد تاريخ</span> 
          @else
      {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
          @endif
       </td>
       <td> 
       <a href="{{ url('portfolio/edit/'.$item->id) }}" class="btn btn-info">تعديل</a>
       <a href="{{ url('portfolio/delete/'.$item->id) }}" onclick="return confirm('هل أنت متأكد من الحذف')" class="btn btn-danger">حذف</a>
        </td> 


    </tr> 
    @endforeach


  </tbody>
</table>
{{ $portfolio->links() }}
  
       </div>
    </div>


    <div class="col-lg-4 col-md-12">
     <div class="card">
          <div class="card-header"> إضافة عمل </div>
          <div class="card-body">
          
         
         
          <form action="{{ route('store.portfolio') }}" method="POST" enctype="multipart/form-data">
          @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">الإسم</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('name')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">الصورة</label>
    <input type="file" name="img" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>

          @error('img')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">الرابط</label>
    <input type="text" name="url" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('url')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">التسمية</label>
    <input type="text" name="tag" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('tag')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


     
  <button type="submit" class="btn btn-primary">أضف عمل</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 

 


    </div>
 @endsection
