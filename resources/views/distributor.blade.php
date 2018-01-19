@extends('layouts.header')

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Distributor
      </h1>
      <br>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Distributor</li>
      </ol>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ Session::get('success') }}
    </div>
@endif

        @if(empty($curDistributor))
         <form method="post" action="{{ route('distributor.store') }}">
        @else
          <form method="post" action=" {{ route('distributor.update', $curDistributor->id) }}">
          <input type="hidden" name="_method" value="PUT">         
        @endif
           {{ csrf_field() }}
        
          <div class="form-group">
            <label for="code">Name</label>
            <input class="form-control" type="text" name="name" value="{{ !empty($curDistributor->name) ? $curDistributor->name : old('name') }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input class="form-control" type="text" name="phone" value="{{ !empty($curDistributor->name) ? $curDistributor->phone : old('phone') }}" placeholder="Enter Phone">
          </div>
         @if(!empty($curDistributor))
         <button type="submit" class="btn btn-primary">Update</button>
         @else
          <button type="submit" class="btn btn-primary">Submit</button>
         @endif
      </form>
    </section>
     <section>
         <table class="table table-responsive">
            <thead>
              <tr>
               <th>S.N</th>
               <th>Name</th>
               <th>Phone</th>            
              </tr>
            </thead>
            <tbody>
              @foreach($data as $k=>$data)
                 <tr>
                   <td>{{ ++$k }} </td>
                   <td>{{ $data->name }}</td>
                   <td>{{ $data->phone }}</td>
                   
                   <td> <a href="{{ route('distributor.edit', $data->id) }}">Edit</a> |
                     <form id="delete_form{{$data->id}}" method="POST" action="{{ route('distributor.destroy', $data->id) }}">
                       {{ csrf_field() }}
                       <input type="hidden" name="_method" value="DELETE">
                       <a onclick="document.getElementById('delete_form{{$data->id}}').submit();preventDefault();" href="#">Delete</a> 
                     </form>
                    </td>
                 
                 </tr>
              @endforeach
            </tbody>
         </table>
     </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('footer')
   @include('layouts.footer')
@endsection


