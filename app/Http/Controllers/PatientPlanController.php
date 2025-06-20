<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientProfile;
use App\Models\{DoctorPlanAssign, PlanAssignFeedback, DoctorPlan, DoctorProfile};
use Validator;
use Auth;
use App\Traits\AuthCode;
use App\Models\User;

class PatientPlanController extends Controller
{
    
	use AuthCode;
    public function index(Request $request) {
		$user_id = Auth::user()->id;
		$plans = DoctorPlanAssign::with('plan')->where('user_id',$user_id)->where('doctor_id', Auth::user()->patient_doctor_id)->where('status','ongoing')->orderBy('created_at','desc')->get();
		$completed_plans = DoctorPlanAssign::with('plan')->where('user_id',$user_id)->where('doctor_id', Auth::user()->patient_doctor_id)->where('status','completed')->orderBy('created_at','desc')->get();
		return view('web_new.patient.plan.index', compact('plans','completed_plans'));
	}
	public function detail(Request $request, $id) {
		$user_id = Auth::user()->id;
		$data = DoctorPlanAssign::with(['plan','plan.doctor_plan_detail','plan.doctor_plan_detail','feedback'])->where('id', $id)->first();
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
        ]);
		if ($validate->fails()) {
			return response()->json(['error'=>$validate->errors()]);
        }
		$feedback_exists = PlanAssignFeedback::where('id', $request_data['id'])->first();
		$history = null;
		if($feedback_exists) {
			$history_new = [
				'rating'     => $feedback_exists['rating'],
				'comment'    => $feedback_exists['comment'],
				'answer'     => $feedback_exists['answer'],
				'updated_at' => $feedback_exists['updated_at'],
			];
			$history = is_array($feedback_exists['history']) ? $feedback_exists['history']: [];
			$history[] = $history_new; 
		}
		$user_id = Auth::user()->id;
		$feedack = PlanAssignFeedback::updateOrCreate(
			[
				'id' => $request_data['id']
			],
			[
				'assign_id'=> $request_data['assign_id'],
				'plan_id' => $request_data['plan_id'],
				'exercise_id' => $request_data['exercise_id'],
				'rating' => $request_data['rating'],
				'comment' => $request_data['comment'] ?? null,
				'answer' => $request_data['answer'] ?? null,
				'history' => $history
			]
		);
		if($feedack) {
			$assign = DoctorPlanAssign::where('id',$request_data['assign_id'])->first();

			// assign plan avg raying
			$assign_plan_avg_rating = PlanAssignFeedback::where('assign_id', $request_data['assign_id'])->avg('rating');
			DoctorPlanAssign::where('id', $request_data['assign_id'])->update(['avg_rating'=>$assign_plan_avg_rating]);

			// plan avg rating
			$doctor_plan_avg_rating = DoctorPlanAssign::where('plan_id', $request_data['plan_id'])->where('avg_rating', '>', 0)->avg('avg_rating');
			DoctorPlan::where('id', $request_data['plan_id'])->update(['avg_rating'=>$doctor_plan_avg_rating]);

			// doctor avg rating
			$doctor_avg_rating = DoctorPlan::where('created_by', $assign->doctor_user_id)->where('avg_rating', '>', 0)->avg('avg_rating');
			DoctorProfile::where('user_id', $assign->doctor_user_id)->update(['avg_rating'=>$doctor_avg_rating]);

			// send mail
			$data['name'] = $assign['doctor_user']['name'];
            $data['email'] = $assign['doctor_user']['email'];
            $data['message'] = trans('sms.patient.plan.assign.feedback', [
				'patient_name' => $assign['user']['name'],
				'plan_name' => $assign['plan']['name'],
				'exercise_name'=> $feedack['exercise']['name'],
				'rating'=>  $request_data['rating'],
				'plan_rating'=> (int) $doctor_plan_avg_rating,
				'doctor_rating'=> (int) $doctor_avg_rating,
			]);
			$data['subject'] = 'Patient Plan Assign Feedback';
            $data['url'] = url('/admin/doctor/plan/'. $assign['plan_id'].'/assign/feedback/'.$assign['id']);
            $this->sendPatientPlanAssignFeedbackEmail($data);

			if($request_data['rating'] < 3) {
				$data['message'] = trans('sms.patient.plan.assign.feedback.support', [
					'patient_name' => $assign['user']['name'],
					'plan_name' => $assign['plan']['name'],
					'exercise_name'=> $feedack['exercise']['name'],
					'rating'=>  $request_data['rating'],
				]);
				$data['subject'] = 'Patient Plan Assign Feedback Low Rating';
				$this->sendPatientPlanAssignFeedbackEmail($data);
			}
		}
		return response()->json(['message'=>'Thanks for given feedback','code'=>200]);
	}
}
