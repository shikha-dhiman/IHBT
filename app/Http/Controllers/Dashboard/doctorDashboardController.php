<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect, DB;
use App\Models\receipt;
use Carbon\Carbon;

class doctorDashboardController extends Controller
{
	public function index(Request $req)
	{
		$todays_receipt = receipt::whereDate('created_at', Carbon::today())->count();
		$total_receipt = receipt::count(); 
		return view('Doctor.Dashboard.index', compact('todays_receipt', 'total_receipt'));
	}
}
