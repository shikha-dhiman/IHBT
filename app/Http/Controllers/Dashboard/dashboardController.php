<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect, DB;
use App\Models\User;
use App\Models\medicine;

class dashboardController extends Controller
{
	public function index(Request $req)
	{
		$employee = User::where('user_type', 1)->count();
		$receptionist = User::where('user_type', 2)->count();
		$doctor = User::where('user_type', 3)->count();
		$medicines = medicine::count();
		return view('Owner.Dashboard.index', compact('employee', 'receptionist', 'doctor', 'medicines'));
	}
}
