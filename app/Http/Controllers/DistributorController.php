<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distributor;
use App\Http\Requests\DistributorRequest;
class DistributorController extends Controller
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
    	$data = Distributor::all();
    	return view('distributor', compact('data'));

    }

    public function store(DistributorRequest $request){

    	 //var_dump($request->all());

         if(Distributor::create($request->all())){
            return redirect()->route('distributor.index')->with('success', 'Distributor stored Successfully');
         }

         return redirect()->back()->with('error','Distributor could not be created');	
    }

    public function update($id, DistributorRequest $request){
             
        if(Distributor::where('id', $id)->update($request->except(['_token','_method'])))
        {
            return redirect()->route('distributor.index')->with('success', 'Updated Successfully');
        }
    }

    public function show($id){
       //echo $id;exit;
    }

    public function edit($distributor){
         $data = Distributor::all();
         $curDistributor = Distributor::find($distributor);
         return view('distributor',compact('data','curDistributor'));
    }

    public function destroy($idd){
 
        if(Distributor::destroy($idd)){
            return redirect()->back()->with('success','Record Deleted');
        }

        return redirect()->back();
    }
}
