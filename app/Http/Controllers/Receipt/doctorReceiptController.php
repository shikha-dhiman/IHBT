<?php

namespace App\Http\Controllers\Receipt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\receipt;
use App\Models\family_member;
use App\Models\User;
use Carbon\Carbon;
use PDF;

class doctorReceiptController extends Controller
{

     public function index(Request $req)
    {
        $employees = user::where('user_type', 1)->orderBy('id', 'DESC')->get();
        return view('Doctor.Receipt.index', compact('employees'));
    }
   /* public function receipts(Request $req)
    {
    	$receipt = receipt::leftJoin('users', 'receipts.emp_id', '=', 'users.id')->select('users.name as emp_name', 'receipts.*')->where('receipts.emp_id', '=', $req->id)->orderBy('receipts.id', 'DESC')->get();
        return view('Doctor.Receipt.receipts', compact('receipt'));
    }*/

      public function detail(Request $req)
    {
       $receipt = receipt::leftJoin('users', 'receipts.emp_id', '=', 'users.id')->select('users.name as emp_name', 'receipts.*')->where('receipts.id', $req->id)->orderBy('receipts.id', 'DESC')->get();
        return view('Doctor.Receipt.detail', compact('receipt'));
    }

     public function viewRecipt(Request $req)
    {
        $customPaper = array(0,0,630,1040);
        $receipt = receipt::leftJoin('users', 'receipts.emp_id', '=', 'users.id')->select('users.name as emp_name', 'receipts.*')->where('receipts.id', $req->id)->get();
        $pdf = PDF::loadView('Doctor.Receipt.pdf', ['receipt' => $receipt])->setPaper($customPaper,'portrait');
        return $pdf->stream('receipt.pdf');
    }
     public function listing(Request $req)
    {
        $employee = User::where('id', $req->id)->get();
        $family_member = family_member::where('user_id', $req->id)->get();
        return view('Doctor.Receipt.listing',compact('employee', 'family_member'));
    }
     public function list_receipt(Request $req)
    {
        $receipt = receipt::where('emp_id', $req->emp_id)->where('family_id', $req->family_id)->orderBy('id', 'DESC')->get();
        return view('Doctor.Receipt.list_receipt',compact('receipt'));

    }

}
