<?php

namespace App\Http\Controllers;
use App\Http\Requests\AddMedicineRequest;
//use Illuminate\Http\Request;
use App\AddMedicine;
use App\Distributor;
class AddMedicineController extends Controller
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
        $data = AddMedicine::paginate(15);
        $distributors = Distributor::all();
        return view('addmedicine', compact('data','distributors'));
    }

    public function store(AddMedicineRequest $request){

         if(AddMedicine::create($request->all())){
            return redirect()->route('addmedicine.index')->with('success', 'AddMedicine stored Successfully');
         }

         return redirect()->back()->with('error','AddMedicine could not be created');	
    }

    public function update($id, AddMedicineRequest $request){

        if(AddMedicine::where('id', $id)->update($request->except(['_method','_token']))){
            return redirect()->route('addmedicine.index')->with('success', 'Updated Successfully');
        }
    }

    public function show($id){
       //echo $id;exit;
    }

    public function edit($addmedicine){
         $data = AddMedicine::all();
         $medicine = AddMedicine::find($addmedicine);
         $distributors = Distributor::all();
         return view('addmedicine',compact('data','medicine','distributors'));
    }

    public function destroy($idd){
        if(AddMedicine::destroy($idd)){
            return redirect()->back()->with('success','Record Deleted');
        }

        return redirect()->back();
    }
}
