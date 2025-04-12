<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientProfile;
use App\Models\{DoctorPlanAssign, PlanAssignFeedback};
use Validator;
use Auth;
use App\Traits\AuthCode;
use App\Models\User;

class PatientPlanController extends Controller
{
    
	use AuthCode;
    public function index(Request $request) {
		$user_id = Auth::user()->id;
		$plans = DoctorPlanAssign::with('plan')->where('user_id',$user_id)->where('status','ongoing')->orderBy('created_at','desc')->get();
		$completed_plans = DoctorPlanAssign::with('plan')->where('user_id',$user_id)->where('status','completed')->orderBy('created_at','desc')->get();
		return view('web_new.patient.plan.index', compact('plans','completed_plans'));
	}
	public function detail(Request $request) {
		$id = $request->get('id');
		$user_id = Auth::user()->id;
		$data = DoctorPlanAssign::with(['plan','plan.doctor_plan_detail'])->where('id', $id)->where('user_id', $user_id)->first();
		if($data) {
			return view('web_new.patient.plan.deatil', compact('data'));
		} else {
			return abort(404);
		}
	}
	public function feedbackStore(Request $request) {
		$request_data = $request->all();
		$validate=Validator::make($request->all(), [
			'assign_id' => 'required',
            'plan_id' => 'required',
			'exercise_id' => 'required',
			'rating' => 'required',
			'title' => 'required',
			'comment' => 'required',
        ]);
		if ($validate->fails()) {
			return response()->json(['error'=>$validate->errors()]);
        }
		$user_id = Auth::user()->id;
		$feedack = PlanAssignFeedback::create([
			'user_id'=>Auth::user()->id,
			'plan_id' => $request_data['plan_id'],
			'exercise_id' => $request_data['exercise_id'],
			'rating' => $request_data['rating'],
			'title' => $request_data['title'],
			'comment' => $request_data['comment'],
		]);
		if($feedack) {
			$avg_rating = PlanAssignFeedback::where('plan_assign_id', $request_data['plan_assign_id'])->avg('rating');
			DoctorPlanAssign::where('id', $request_data['plan_assign_id'])->update(['avg_rating'=>avg_rating]);
		}
		return response()->json(['message'=>'Thanks for given feedback','code'=>200]);
	}
}
