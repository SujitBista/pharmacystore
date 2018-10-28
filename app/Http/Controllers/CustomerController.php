<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Http\Requests\CustomerRequest;
class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(3);
        return view('customer.index', compact('customers'));
    }

    public function store(CustomerRequest $request){

         if(Customer::create($request->all())){
            return redirect()->route('customer.index')->with('success', 'Customer created Successfully');
         }

         return redirect()->back()->with('error','Customer could not be created');	
    }

    public function update($id, CustomerRequest $request){

        if(Customer::where('id', $id)->update($request->except(['_method','_token']))){
            return redirect()->route('customer.index')->with('success', 'Updated Successfully');
        }
    }

    public function edit($customer_id){
         $customers = Customer::paginate(3);
         $customer = Customer::find($customer_id);
         return view('customer.index',compact('customers','customer'));
    }

    public function destroy($cid){
        if(Customer::destroy($cid)){
            return redirect()->back()->with('success','Record Deleted');
        }

        return redirect()->back();
    }

}
