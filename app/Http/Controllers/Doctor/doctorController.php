<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\doctor;
use App\Models\User;
use File, Validator;

class doctorController extends Controller
{
   public function index(Request $req)
    {
        $user = User::where('user_type', $req->input('type'))->get();
        return view('Owner.Employee.index', compact('user'));
    }
}
