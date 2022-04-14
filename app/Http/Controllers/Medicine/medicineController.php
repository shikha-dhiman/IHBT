<?php

namespace App\Http\Controllers\Medicine;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\medicine;

class medicineController extends Controller
{
    public function index(Request $req)
    {
    	$medicine = medicine::orderBy('id', 'DESC')->get();
    	return view('Owner.Medicine.index', compact('medicine'));
    }

    public function add(Request $req)
    {
    	if($req->isMethod('post')){
    		$checkIfExists = medicine::where('name', $req->name)->count();
    		if($checkIfExists == 0){
    			$medicine = new medicine;
	            $medicine->name = $req->name;
	            $medicine->quantity = $req->quantity;
	            $medicine->salt_description = $req->salt_description;
	            $medicine->save();
	            return redirect('owner/medicines/')->with('success', 'Added successfully.');
    		}
    		redirect()->back()->withErrors(['Already exists.']);
    		
    	}
    	
    	return view('Owner.Medicine.add');
    }

    public function delete(Request $req)
    {
        $delete = medicine::where('id', $req->id)->delete();
        if($delete == true){
            $message = "Deleted successfully.";
            return $message;
        } 
    }

     public function edit(Request $req)
    {
        if($req->isMethod('post')){
            $receipt = medicine::where('id', $req->input('id'))
                    ->update(['name' => $req->name, 'quantity' => $req->quantity, 'salt_description' => $req->salt_description]);
            return redirect('owner/medicines/')->with('success', 'Updated successfully.');
        }

        $medicine = medicine::where('id', $req->id)->get();
        return view('Owner.Medicine.edit', compact('medicine'));

    }
}
