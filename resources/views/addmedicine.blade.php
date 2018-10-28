@extends('layouts.header')

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
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
        <div class="col-md-6">
        <h1>
          Add Medicine
        </h1>
        
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
          </div>
          <div class="col-md-6">
              <h1>Add Quanity</h1>
              <form method="post" action="{{ route('addmedicine.updatequantity') }}">
                 {{ csrf_field() }}
                 <div class="form-group">
                  <label for="code">Medicine Name</label>
                  <select class="form-control" name="stock_id" id="stock_id">
                     <option value="">--Select--</option>
                     @foreach($stocks as $stock)
                        <option id="{{ $stock->id }}" name="{{ $stock->name }}" value="{{ $stock->id }}">{{ $stock->name }}</option>
                     @endforeach
                  </select>
                    <label for="qty">Quantiy</label>
                  <input type="text" class="form-control" name="qty" id="qty"  placeholder="Enter Quantity">
                 </div>
                 <button type="submit" class="btn btn-primary">Add</button>
              </form>
          </div>
    </section>
     <section style="padding:22px">
         <div class="row">
           <div class="col-md-12">
               <h2>Stock</h2>
               Showing {{ $stocks->count() }} of {{ $stocks->total()}} 
               <table style="background:#ccc" class="table table-responsive">
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
                    @foreach($stocks as $stock)
                       <tr>
                         <td>{{ $stock->code }}</td>
                         <td>{{ $stock->distributor->name }}</td>
                         <td>{{ $stock->name }}</td>
                         <td>{{ $stock->itemdescription }}</td>
                         <td>{{ $stock->pack }}</td>
                         <td>{{ $stock->batchnumber }}</td>
                         <td>{{ $stock->expdate }}</td>
                         <td>{{ $stock->qty }}</td>
                         <td>{{ $stock->rate }}</td>
                         <td>{{ $stock->type }}</td>
                         <td>{{ $stock->qty * $stock->rate }}</td>
                         
                         <td> <a href="{{ route('addmedicine.edit', $stock->id) }}">Edit</a> |
                           <form id="delete_form{{$stock->id}}" method="POST" action="{{ route('addmedicine.destroy', $stock->id) }}">
                             {{ csrf_field() }}
                             <input type="hidden" name="_method" value="DELETE">
                             <a onclick="document.getElementById('delete_form{{$stock->id}}').submit();preventDefault();" href="#">Delete</a> 
                           </form>
                          </td>
                       
                       </tr>
                    @endforeach
                  </tbody>
               </table>
               {{ $stocks->links() }}
           </div>
         </div> 
     </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   
@endsection

@section('footer')
   @include('layouts.footer')
@endsection


