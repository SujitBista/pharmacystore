@extends('layouts.header')

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Medicine
      </h1>
      <br>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Medicine</li>
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

        @if(empty($medicine))
         <form method="post" action="{{ route('addmedicine.store') }}">
        @else
          <form method="post" action=" {{ route('addmedicine.update', $medicine->id) }}">
          <input type="hidden" name="_method" value="PUT">         
        @endif
           {{ csrf_field() }}
        
          <div class="form-group">
            <label for="code">Code</label>
            <input type="text" class="form-control" name="code" id="code"  placeholder="Enter Code" value="{{ !empty($medicine) ? $medicine->code : old('code') }}" required>
            <label for="distributor_id">Party</label>
            <select class="form-control" name="distributor_id" id="distributor_id">
               <option value="0">--Select--</option>
               @foreach($distributors as $distributor)
                  <option id="{{ $distributor->id }}" name="{{ $distributor->name }}" value="{{ $distributor->id }}">{{ $distributor->name }}</option>
               @endforeach
            </select>
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control">
               <option value="0">--Select--</option>
               <option>Syrup</option>
               <option>Lotion</option>
               <option>Injection</option>
               <option>Powder</option>
               <option>Cream</option>
               <option>Eye Drop</option>
               <option>Tablet</option>
               <option>Capsule</option>
            </select>
             <label for="pack">Pack</label>
            <select name="pack" id="pack" class="form-control">
               <option value="0">--Select--</option>
               <option>Strip</option>
               <option>ML</option>
               <option>Ointment</option>
            </select>
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ !empty($medicine) ?  $medicine->name : old('name') }}" placeholder="Enter Name">
            <label for="description">Item Description</label>
            <input type="text" class="form-control" name="itemdescription" id="itemdescription" value="{{ !empty($medicine) ? $medicine->itemdescription : old('itemdescription') }}" placeholder="Enter description">
            <label for="qty">Qty</label>
            <input type="text" class="form-control" name="qty" id="qty" value="{{ !empty($medicine) ? $medicine->qty : old('qty') }}" placeholder="Enter qty">
            <label for="expdate">Exp Date</label>
            <div class="input-group date" data-provide="datepicker">
              <div class="input-group-addon">
                 <span class="glyphicon glyphicon-calendar"></span>
              </div>
              <input type="text" class="form-control" name="expdate" id="expdate" value="{{ !empty($medicine) ? $medicine->expdate : old('expdate') }}" placeholder="mm/dd/yyyy">
            </div>
            <label for="rate">CC/Rate</label>
            <input type="text" class="form-control" name="rate" id="rate" value="{{ !empty($medicine) ? $medicine->rate : old('rate') }}" placeholder="Enter rate">
            <label for="batchnumber">Batch Number</label>
            <input type="text" class="form-control" name="batchnumber" id="batchnumber" value="{{ !empty($medicine) ? $medicine->batchnumber : old('batchnumber') }}" placeholder="Enter batch Number">
            <label for="mrp">MRP</label>
            <input type="text" class="form-control" name="mrp" id="mrp" value="{{ !empty($medicine) ? $medicine->mrp : old('mrp') }}" placeholder="Enter Mrp">
          </div>
         @if(!empty($medicine))
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
               <th>Code</th>
               <th>Party</th>
               <th>Name</th>
               <th>Item Description</th>
               <th>Pack</th>
               <th>Batch</th>
               <th>Exp Date</th>
               <th>Qty</th>
               <th>CC/Rate</th>
               <th>Type</th>
               <th>Amout</th>
               
              
              </tr>
            </thead>
            <tbody>
              @foreach($data as $data)
                 <tr>
                   <td>{{ $data->code }}</td>
                   <td>{{ $data->id }}</td>
                   <td>{{ $data->name }}</td>
                   <td>{{ $data->itemdescription }}</td>
                   <td>{{ $data->pack }}</td>
                   <td>{{ $data->batchnumber }}</td>
                   <td>{{ $data->expdate }}</td>
                   <td>{{ $data->qty }}</td>
                   <td>{{ $data->rate }}</td>
                   <td>{{ $data->type }}</td>
                   <td>{{ $data->qty * $data->rate }}</td>
                   
                   <td> <a href="{{ route('addmedicine.edit', $data->id) }}">Edit</a> |
                     <form id="delete_form{{$data->id}}" method="POST" action="{{ route('addmedicine.destroy', $data->id) }}">
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


