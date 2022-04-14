<?php

namespace App\Http\Controllers\Medicine;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\medicine;
use App\Models\receipt;
use App\Models\alloted_medicines;
use App\Models\final_alloted_medicines;


class receptionistMedicineController extends Controller
{
    public function index(Request $req)
    {
    	$receipt = receipt::where('is_created', 0)->get();
    	return view('Receptionist.Medicine.index', compact('receipt'));
    	
    }
    
    public function add(Request $req)
    {
    	if($req->isMethod('post')){
            $getALlotedMedicine = alloted_medicines::where('receipt_id', $req->receipt_id)->where('is_row', 1)->get();
            foreach ($getALlotedMedicine  as $key => $value) {
                $id = $value->id;
                $row_id[] = $id;
            }
            $final_alloted = new final_alloted_medicines;
            $final_alloted->receipt_id = $req->receipt_id;
            $final_alloted->row_id = json_encode($row_id);
            $final_alloted->save();

            $update_rows = alloted_medicines::where('receipt_id', $req->receipt_id)->update(['is_row' => '0']);

            return $update_rows;
    		/*return redirect('receptionist_user/medicines/')->with('success', 'Added successfully.');*/
    	}
    	$medicines = medicine::get();
    	return view('Receptionist.Medicine.add', compact('medicines'));
    }

    public function addMedicines(Request $req)
    {
        if($req->isMethod('post')){
            $medicine = new alloted_medicines;
            $medicine->medicine_id = $req->med_id;
            $medicine->quantity = $req->quantity;
            $medicine->receipt_id = $req->receipt_id;
            $medicine->is_row = 1;
            $medicine->save();
            return $medicine;
        }
    }

     public function deleteMedicines(Request $req)
    {
        if($req->isMethod('post')){
            $medicine = alloted_medicines::where('id', $req->row_id)->delete();
            return $medicine;
        }
    }
    public function deleterows(Request $req)
    {
        if($req->isMethod('post')){
            $medicine = alloted_medicines::where('receipt_id', $req->row_id)->where('is_row', 1)->delete();
            return $medicine;
        }
    }
}
