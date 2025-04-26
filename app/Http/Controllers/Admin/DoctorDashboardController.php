<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{DoctorPlan,DoctorExercise};
use App\Models\User;
use Carbon\Carbon;
use Auth;

class DoctorDashboardController extends Controller
{
    public function index() {
        $user_id = Auth::user()->id;
        $dotor_profile = Auth::user()->doctor_profile;
        $doctor_id = $dotor_profile->id;
		$count = [];
		$count['user'] = User::whereHas('patient_profile', function ($q) use($doctor_id) {
			$q->where('doctor_id', $doctor_id);
		})->count();
		$count['new_member'] = User::whereHas('patient_profile', function ($q) use($doctor_id) {
			$q->where('doctor_id', $doctor_id)
              ->whereBetween('created_at', [
                Carbon::now()->subMonth()->startOfDay(),
                Carbon::now()->endOfDay()
            ]);
		})->count();
		$count['exercise'] = DoctorExercise::where('created_by', $user_id)->count();
		$count['plan'] = DoctorPlan::where('created_by', $user_id)->count();

		$count['latest_user'] = User::with('patient_profile')
		->whereHas('patient_profile', function  ($q) use($doctor_id) {
			$q->where('doctor_id', $doctor_id)
              ->whereBetween('created_at', [
                Carbon::now()->subMonth()->startOfDay(),
                Carbon::now()->endOfDay()
            ]);
		})->get()->sortByDesc(function ($user) {
			return $user->patient_profile->created_at;
		})->take(8);
	
		// latest plan
		$count['latest_plan'] = DoctorPlan::where('created_by', $user_id)
        ->whereBetween('created_at', [
			Carbon::now()->subMonth()->startOfDay(),
			Carbon::now()->endOfDay()
		])->orderBy('created_at', 'desc')->limit(5)->get();

		return view('admin.doctor.dashboard.index',compact('count'));
	}
}
