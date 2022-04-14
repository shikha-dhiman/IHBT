<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect, DB;
use App\Models\User;
use App\Models\receipt;
use Carbon\Carbon;

class receptionistDashboardController extends Controller
{
   public function index(Request $req)
	{
		$employee = User::where('user_type', 1)->count();
		$todays_receipt = receipt::whereDate('created_at', Carbon::today())->count();
		$total_receipt = receipt::count(); 
		return view('Receptionist.Dashboard.index', compact('employee', 'todays_receipt', 'total_receipt'));
	} 
}
