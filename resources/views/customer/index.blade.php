@extends('layouts.header')

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
         <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add Customers</li>
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
          Add Customers
        </h1>
        
          @if(empty($customer))
              <form method="post" action="{{ route('customer.store') }}">
          @else
              <form method="post" action=" {{ route('customer.update', $customer->id) }}">
                  <input type="hidden" name="_method" value="PUT">         
          @endif
                 {{ csrf_field() }}
              
                <div class="form-group">
                  
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ !empty($customer) ?  $customer->name : old('name') }}" placeholder="Enter Name">
                  <label for="Email">Email</label>
                  <input type="text" class="form-control" name="email" id="email" value="{{ !empty($customer) ? $customer->email : old('email') }}" placeholder="Enter Email">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" name="phone" id="phone" value="{{ !empty($customer) ? $customer->phone : old('phone') }}" placeholder="Enter phone">
                  <label for="address1">Address1</label>
                  <input type="text" class="form-control" name="address1" id="address1" value="{{ !empty($customer) ? $customer->address1 : old('address1') }}" placeholder="Enter address1">
                  <label for="address2">Address2</label>
                  <input type="text" class="form-control" name="address2" id="address2" value="{{ !empty($customer) ? $customer->address2 : old('address2') }}" placeholder="Enter address2">
                </div>
               @if(!empty($customer))
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
               <h2>Customer</h2>
               Showing {{ $customers->count() }} of {{ $customers->total()}} 
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
                    @foreach($customers as $customer)
                       <tr>
                         <td>{{ $customer->name }}</td>
                         <td>{{ $customer->email }}</td>
                         <td>{{ $customer->phone }}</td>
                         <td>{{ $customer->address1 }}</td>
                         <td>{{ $customer->address2 }}</td>
                         {{ $customer->id}}
                         
                         <td> <a href="{{ route('customer.edit', $customer->id) }}">Edit</a> |
                           <form id="delete_form{{$customer->id}}" method="POST" action="{{ route('customer.destroy', $customer->id) }}">
                             {{ csrf_field() }}
                             <input type="hidden" name="_method" value="DELETE">
                             <a onclick="document.getElementById('delete_form{{$customer->id}}').submit();preventDefault();" href="#">Delete</a> 
                           </form>
                          </td>
                       
                       </tr>
                    @endforeach
                  </tbody>
               </table>
               {{ $customers->links() }}
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


