@extends('admin.admin_master')

@section('admin')

    <div class="py-12"> 
   <div class="container">
    <div class="row">
        <div class="col-md-6">
          <h4>صفحة التواصل </h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="{{ route('add.contact') }}"> <button class="btn btn-info">أضف تواصل</button>  </a>
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


          <div class="card-header"> بيانات التواصل </div>
    

    <table class="table table-responsive">
        <thead>
          <tr>
            <th scope="col" width="5%"># </th>
            <th scope="col" width="15%">العنوان</th>
            <th scope="col" width="25%">البريد الإلكتروني</th>
            <th scope="col" width="15%">الهاتف</th>
            <th scope="col" width="15%">الإجراء</th>
          </tr>
        </thead>
        <tbody>
                @php($i = 1)
              @foreach($contacts as $con) 
          <tr>
            <th scope="row"> {{ $i++  }} </th>
            <td> {{ $con->address }} </td>
            <td> {{ $con->email }} </td>
            <td> {{ $con->phone }} </td>
            
            <td> 
            <a href="{{ url('contact/edit/'.$con->id) }}" class="btn btn-info">تعديل</a>
            <a href="{{ url('contact/delete/'.$con->id) }}" onclick="return confirm('هل أنت متأكد من الحذف')" class="btn btn-danger">حذف</a>
              </td> 
    
    
          </tr> 
          @endforeach
    
    
        </tbody>
   
    </table>
    {{ $contacts->links() }}
  
       </div>
    </div>

 


    </div>
  </div> 

 


    </div>
 @endsection
