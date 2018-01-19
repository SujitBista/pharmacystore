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

    <form>
      <div class="form-group">
        <label for="code">Code</label>
        <input type="text" class="form-control" name="code" id="code" placeholder="Enter Code" required>
        <label for="exampleInputEmail1">Party</label>
        <select class="form-control">
           <option>Abhishek Medico</option>
           <option>Galaxy Pharma Distributor</option>
           <option>Some Other Medico</option>
        </select>
        <label for="exampleInputEmail1">Type</label>
        <select class="form-control">
           <option>Syrup</option>
           <option>Lotion</option>
           <option>Injection</option>
           <option>Powder</option>
           <option>Cream</option>
           <option>Eye Drop</option>
           <option>Tablet</option>
           <option>Capsule</option>
        </select>
         <label for="exampleInputEmail1">Pack</label>
        <select class="form-control">
           <option>Strip</option>
           <option>ML</option>
        </select>
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Name">
        <label for="exampleInputEmail1">Item Description</label>
        <input type="text" class="form-control" id="description" placeholder="Enter description">
        <label for="exampleInputEmail1">Qty</label>
        <input type="text" class="form-control" id="qty" placeholder="Enter qty">
        <label for="exampleInputEmail1">Exp Date</label>
        <input type="text" class="form-control" id="expdate" placeholder="Enter exp date">
        <label for="exampleInputEmail1">Rate</label>
        <input type="text" class="form-control" id="rate" placeholder="Enter rate">
        <label for="exampleInputEmail1">Batch Number</label>
        <input type="text" class="form-control" id="batchnumber" placeholder="Enter batch Number">
        <label for="exampleInputEmail1">MRP</label>
        <input type="text" class="form-control" id="mrp" placeholder="Enter Mrp">
      </div>
     <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('footer')
   @include('layouts.footer')
@endsection


