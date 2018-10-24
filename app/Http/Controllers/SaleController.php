<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\AddMedicine;
use App\Customer;

class SaleController extends Controller
{
     /**
     * Sale is a party
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
    	$sales = Sale::paginate(3);
    	$addmedicines = AddMedicine::all();
    	$customers = Customer::all();
    	return view('sale.index', compact('sales','addmedicines','customers'));

    }

    public function store(Request $request){

         if(Sale::create($request->all())){
            return redirect()->route('sale.index')->with('success', 'Sale stored Successfully');
         }

         return redirect()->back()->with('error','Sale could not be created');	
    }

    public function update($id, SaleRequest $request){
             
        if(Sale::where('id', $id)->update($request->except(['_token','_method'])))
        {
            return redirect()->route('sale.index')->with('success', 'Updated Successfully');
        }
    }

    public function show($id){
       //echo $id;exit;
    }

    public function edit($Sale){
         $data = Sale::all();
         $curSale = Sale::find($Sale);
         return view('sale',compact('data','curSale'));
    }

    public function destroy($idd){
 
        if(Sale::destroy($idd)){
            return redirect()->back()->with('success','Record Deleted');
        }

        return redirect()->back();
    }
}
