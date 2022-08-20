@extends('layouts.admin')

@section('content')
  <div class="card">
      <div class="card-header">
        <h4>Product Page </h4>
        <hr>
      </div>

     <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
             <tr>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Description</th>
                 <th>Image</th>
                 <th>Edit</th>
                 <th>Delete</th>
             </tr>
          </thead>
          <tbody>
             @foreach ($products as $item)
             <tr>
                     <td>{{$item-> id}}</td>
                     <td>{{$item-> name}}</td>
                     <td>{{$item-> description}}</td>
                     <td>
                        <img src="{{ asset ('assets/uploads/products/'.$item->image)}}" class="cate-image" alt= "Image here">
                     </td>
                     <td>
                         <a href="#" class="btn btn-primary">Edit</button>
                     </td>
                     <td>
                         {{-- <a href="{{ url('delete-category/'.$item-> id)}}" class="btn btn-danger">Delete</button> --}}
                            <a href="#" class="btn btn-danger">Delete</a>
                     </td>
                     </td>
               </tr>
               @endforeach
          </tbody>
        </table>
      </div>
   </div>
@endsection