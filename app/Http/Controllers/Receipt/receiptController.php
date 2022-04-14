<?php

namespace App\Http\Controllers\Receipt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\family_member;
use App\Models\receipt;
use PDF, Validator, File;
ini_set('max_execution_time', 180);

class receiptController extends Controller
{
     public function index(Request $req)
    {
        $user = User::where('user_type', 1)->get();
        return view('Receptionist.Receipt.index', compact('user'));
    }

     public function detail(Request $req)
    {
        $family_member = family_member::leftJoin('users', 'family_members.user_id', '=', 'users.id')->select('family_members.*', 'users.name as employee_name')->where('user_id', $req->input('id'))->get();
        //$family_member = family_member::where('user_id', $req->id)->get();
        $noOfMember = family_member::where('user_id', $req->input('id'))->count();
        $employee = User::where('id', $req->input('id'))->get();
        return view('Receptionist.Receipt.detail', compact('family_member', 'employee', 'noOfMember'));
    }

     public function createRecipt(Request $req)
    {
       if($req->isMethod('post')){ 
            date_default_timezone_set('asia/kolkata');
            $date = date('Y-m-d H:i:s');

            $is_created = receipt::where('emp_id', $req->emp_id)->where('patient_name', $req->name)->where('age', $req->age)->where('is_created', 1)->where('gender', $req->sex)->count();
            if($is_created == 1){
                $customPaper = array(0,0,630,1040);
                $pdf = PDF::loadView('Receptionist.Receipt.receipt_pdf', ['registration_no' => $this->generateUniqueCode(), 'patient_name' => $req->name, 'date' => $date, 'blood_pressure', json_encode(['bp_max' => $req->bp_max, 'bp_min' => $req->bp_min]), 'blood_sugar' =>$req->blood_sugar, 'temperature' =>$req->temperature, 'age' => $req->age, 'sex' => $req->sex])->setPaper($customPaper,'portrait');
               return $pdf->download('receipt.pdf');
                /*return redirect()->back()->withErrors(['Receipt alredy created']);*/
            }

            $receipt = new receipt;
            $receipt->emp_id = $req->emp_id;
            $receipt->family_id = $req->family_id;
            $receipt->registration_no = $this->generateUniqueCode();
            $receipt->patient_name = $req->name;
            $receipt->date = $date;
            $receipt->age = $req->age;
            $receipt->gender = $req->sex;
            $receipt->is_created = 1;
            $receipt->is_active = 1;
            $receipt->blood_pressure = json_encode(['bp_max' => $req->bp_max, 'bp_min' => $req->bp_min]);
            $receipt->blood_sugar = $req->blood_sugar;
            $receipt->temperature = $req->temperature;
            $receipt->save();
            $customPaper = array(0,0,630,1040);
            $pdf = PDF::loadView('Receptionist.Receipt.receipt_pdf', ['registration_no' => $this->generateUniqueCode(), 'patient_name' => $req->name, 'date' => $date, 'blood_pressure', json_encode(['bp_max' => $req->bp_max, 'bp_min' => $req->bp_min]), 'blood_sugar' =>$req->blood_sugar, 'temperature' =>$req->temperature, 'age' => $req->age, 'sex' => $req->sex])->setPaper($customPaper,'portrait');
           return $pdf->download('receipt.pdf');
        }
        return view('Receptionist.Receipt.create');
    }

     public function generateUniqueCode()
    {
        $code = random_int(100000, 999999);
        return $code;
    }


    public function listing(Request $req)
    {
        $employee = User::where('id', $req->id)->get();
        $family_member = family_member::where('user_id', $req->id)->get();
        return view('Receptionist.Receipt.listing',compact('employee', 'family_member'));
    }

    public function list_receipt(Request $req)
    {
        $receipt = receipt::where('emp_id', $req->emp_id)->where('family_id', $req->family_id)->orderBy('id', 'DESC')->get();
        return view('Receptionist.Receipt.list_receipt',compact('receipt'));

    }
     public function edit(Request $req)
    {
        if($req->isMethod('post')){
            $rule = ['image' => 'required|mimes:pdf,xlx,csv|max:2048',
            ];
            $validator = Validator::make($req->all(), $rule);
           if($validator->fails()){
                $errors = $validator->errors()->first();
                return redirect()->back()->withErrors($errors);
            }else{
                $photo = "";
                $fileModel = new File;
                if($req->file()) {
                    $data = $req->input('image');
                    $photo = $req->file('image')->getClientOriginalName();
                    $destination = base_path() . '/public/user_asset/images';
                    $req->file('image')->move($destination, $photo);
                }

                $receipt = receipt::where('id', $req->input('id'))
                        ->update(['diagnosis' => $req->diagnosis, 'pdf' => $photo, 'is_created' => 0, 'blood_pressure' => json_encode(['bp_max' => $req->bp_max, 'bp_min' => $req->bp_min]), 'blood_sugar' => $req->blood_sugar, 'temperature' => $req->temperature]);
                 return redirect('receptionist_user/receipt/receipt/?emp_id='.$req->input('emp_id').'&family_id='.$req->input('family_id'))->with('success', 'Updated successfully.');
            } 

            
        }
        $receipt = receipt::where('id', $req->input('id'))->get();
        return view('Receptionist.Receipt.edit', compact('receipt'));

    }

    public function receiptView(Request $req)
    {
        $receipt = receipt::where('id', $req->input('id'))->get();
        return view('Receptionist.Receipt.view', compact('receipt'));
    }
     public function viewRecipt(Request $req)
    {
        $customPaper = array(0,0,630,1040);
        $receipt = receipt::leftJoin('users', 'receipts.emp_id', '=', 'users.id')->select('users.name as emp_name', 'receipts.*')->where('receipts.id', $req->id)->get();
        $pdf = PDF::loadView('Doctor.Receipt.pdf', ['receipt' => $receipt])->setPaper($customPaper,'portrait');
        return $pdf->stream('receipt.pdf');
    }
    

}
