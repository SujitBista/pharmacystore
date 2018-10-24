@extends('layouts.header')

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
         <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add sales</li>
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
        <div class="col-md-12">
        <h1>
          Add Sales
        </h1>
        
          @if(empty($sale))
              <form method="post" action="{{ route('sale.store') }}">
          @else
              <form method="post" action=" {{ route('sale.update', $sale->id) }}">
                  <input type="hidden" name="_method" value="PUT">         
          @endif
                 {{ csrf_field() }}
              
                <div class="form-group">
                  <label for="addmedicine_id">Medicine Name</label>
                  <select class="form-control" name="addmedicine_id" id="addmedicine_id">
                     <option value="0">--Select--</option>
                     @foreach($addmedicines as $addmedicine)
                        <option id="{{ $addmedicine->id }}" name="{{ $addmedicine->name }}" value="{{ $addmedicine->id }}">{{ $addmedicine->name }}</option>
                     @endforeach
                  </select>
                  <label for="customer_id">Customer Name</label>
                  <select class="form-control" name="customer_id" id="customer_id">
                     <option value="0">--Select--</option>
                     @foreach($customers as $customer)
                        <option id="{{ $customer->id }}" name="{{ $customer->name }}" value="{{ $customer->id }}">{{ $customer->name }}</option>
                     @endforeach
                  </select>
                  <label for="qty">Qty</label>
                  <input type="text" class="form-control" name="qty" id="qty" value="{{ !empty($sale) ? $sale->qty : old('qty') }}" placeholder="Enter Quantity">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" name="price" id="price" value="{{ !empty($sale) ? $sale->price : old('price') }}" placeholder="Enter price">
                  <label for="comment">Comment</label>
                  <input type="textarea" class="form-control" name="comment" id="comment" value="{{ !empty($medicine) ? $medicine->comment : old('comment') }}" placeholder="Enter Comment">
      
                </div>
               @if(!empty($medicine))
               <button type="submit" class="btn btn-primary">Update</button>
               @else
                <button type="submit" class="btn btn-primary">Submit</button>
               @endif
            </form>
          </div>
    </section>
     <section style="padding:22px">
         <div class="row">
           <div class="col-md-12">
               <h2>sale</h2>
               Showing {{ $sales->count() }} of {{ $sales->total()}} 
               <table style="background:#ccc" class="table table-responsive">
                  <thead>
                    <tr>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Phone</th>
                     <th>Address1</th>
                     <th>Address2</th>              
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($sales as $sale)
                       <tr>
                         <td>{{ $sale->name }}</td>
                         <td>{{ $sale->email }}</td>
                         <td>{{ $sale->phone }}</td>
                         <td>{{ $sale->address1 }}</td>
                         <td>{{ $sale->address2 }}</td>
                         {{ $sale->id}}
                         
                         <td> <a href="{{ route('sale.edit', $sale->id) }}">Edit</a> |
                           <form id="delete_form{{$sale->id}}" method="POST" action="{{ route('sale.destroy', $sale->id) }}">
                             {{ csrf_field() }}
                             <input type="hidden" name="_method" value="DELETE">
                             <a onclick="document.getElementById('delete_form{{$sale->id}}').submit();preventDefault();" href="#">Delete</a> 
                           </form>
                          </td>
                       
                       </tr>
                    @endforeach
                  </tbody>
               </table>
               {{ $sales->links() }}
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


