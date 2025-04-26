<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Plan,Exercise};
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index() {
		$count = [];
		$count['user'] = User::whereHas('roles', function ($q) {
			$q->where('name', 'doctor');
		})->count();
		$count['new_member'] = User::whereHas('roles', function ($q) {
			$q->where('name', 'doctor');
		})->whereBetween('created_at', [
			Carbon::now()->subMonth()->startOfDay(),
			Carbon::now()->endOfDay()
		])->count();
		$count['exercise'] = Exercise::count();
		$count['plan'] = Plan::count();

		$count['latest_user'] = User::with('doctor_profile')
		->whereHas('roles', function ($q) {
			$q->where('name', 'doctor');
		})->whereBetween('created_at', [
			Carbon::now()->subMonth()->startOfDay(),
			Carbon::now()->endOfDay()
		])->orderBy('created_at', 'desc')->limit(8)->get();
	
		// latest plan
		$count['latest_plan'] = Plan::whereBetween('created_at', [
			Carbon::now()->subMonth()->startOfDay(),
			Carbon::now()->endOfDay()
		])->orderBy('created_at', 'desc')->limit(5)->get();
		return view('admin.dashboard.index',compact('count'));
	}
}
