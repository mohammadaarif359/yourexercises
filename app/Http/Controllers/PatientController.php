<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientProfile;
use Validator;
use Auth;
use App\Traits\AuthCode;
use App\Models\User;

class PatientController extends Controller
{
    
	use AuthCode;
    public function profile(Request $request) {
		$user_id = Auth::user()->id;
		$data = PatientProfile::with(['patient_doctor','patient_doctor.user'])->where('user_id', $user_id)->first();
		return view('web_new.patient.profile', compact('user_id', 'data'));
	}
}
