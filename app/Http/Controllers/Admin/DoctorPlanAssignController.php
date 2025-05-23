<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{DoctorPlan, DoctorPlanAssign, DoctorPlanDetail, User};
use App\Traits\AuthCode;
use DB;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\{Storage};

class DoctorPlanAssignController extends Controller
{
    use AuthCode;
    protected $doctor_id;
    protected $doctor_user_id;

    public function __construct()
{
    $this->middleware(function ($request, $next) {
        $user = Auth::user();
        if ($user && $user->hasRole('doctor')) {
            $this->doctor_id = $user->doctor_profile->id;
            $this->doctor_user_id = $user->id;
        }
        return $next($request);
    });
}

	public function index(Request $request) {
        $plan_id = $request->plan_id;
		$doctor_id = $this->doctor_id;
        $doctor_user_id = $this->doctor_user_id;
        if ($request->ajax()) {
            $results = DoctorPlanAssign::where('doctor_user_id', $doctor_user_id)->where('plan_id', $plan_id)->get();
			return Datatables::of($results)
                ->addColumn('user_name', function ($data) {
                    return !empty($data->user) ? $data->user['name'] : '';
                })
				->addColumn('action', function ($data) {
					$btn = '<a href="/admin/doctor/plan/'.$data->id.'/assign/edit/'.$data->id.'" class="" title="Edit"><i class="fa fa-edit"></i></a>
                    <a href="/admin/doctor/plan/'.$data->id.'/assign/feedback/'.$data->id.'" class="" title="Feedback"><i class="fa fa-comments"></i></a>';
					return $btn;
				})->editColumn('completed_at', function ($data) {
                    if($data->completed_at) {
                        return [
                            'display' => Carbon::parse($data->completed_at)->format('d-m-Y h:i A'),
                            'timestamp' => $data->completed_at
                        ];
                    }
                    return ['display'=> null, 'timestamp' => null];
				})->editColumn('created_at', function ($data) {
					return [
						'display' => Carbon::parse($data->created_at)->format('d-m-Y h:i A'),
						'timestamp' => $data->created_at
					];
				})->make(true);
		}

        $users = User::whereHas('patient_profile', function ($q) use($doctor_id) {
            $q->where('doctor_id', $doctor_id);
        })->get();
		return view('admin.doctor.plan-assign.list', compact('plan_id', 'users'));
	}
	public function store(Request $request, $plan_id) {
		$request_data = $request->all();
        $request->validate([
			'user_id'    => 'required|array|min:1',
		]);
	
        $exercise_count= DoctorPlanDetail::where('doctor_plan_id', $plan_id)->where('created_by', $this->doctor_user_id)->count();
        foreach($request_data['user_id'] as $user_id) {
            $assign = DoctorPlanAssign::create([
                'plan_id' => $plan_id,
                'user_id' => $user_id,
                'doctor_user_id' => $this->doctor_user_id,
                'doctor_id' => $this->doctor_id,
                'exercise_count' => $exercise_count,
            ]);

            $data['name'] = $assign['user']['name'];
            $data['email'] = $assign['user']['email'];
            $data['message'] = trans('sms.patient.plan.assign', ['plan_name' => $assign['plan']['name']]);
            $data['url'] = url('/clinic/'. $assign['doctor']['slug']);
            $this->sendPatientPlanAssignEmail($data);   
        }
        return redirect()->back()->with('success', 'Plan assign successfully !');
	}
	public function edit($id) {
        $data = DoctorPlanAssign::find($id);
		if ($data) {
            $doctor_id = $data->doctor_id;
            $users = User::whereHas('patient_profile', function ($q) use($doctor_id) {
                $q->where('doctor_id', $doctor_id);
            })->get();
			return view('admin.doctor.plan-assign.edit', compact('data', 'users'));
		} else {
			abort(404);
		}
	}
	public function update(Request $request) {
		$request_data = $request->all();
        $request->validate([
			'id' => 'required',
            'status' => 'required',
		]);
        $assign = DoctorPlanAssign::where('id', $request['id'])->first();
		if($assign) {
            if ($request_data['status'] == 'completed' && $assign->status == 'ongoing') {
                $assign->status = $request_data['status'];
                $assign->completed_at = Carbon::now();
                $assign->save();

                $data['name'] = $assign['user']['name'];
                $data['email'] = $assign['user']['email'];
                $data['message'] = trans('sms.patient.plan.assign.completed', ['plan_name' => $assign['plan']['name']]);
                $data['url'] = url('/clinic/'. $assign['doctor']['slug']);
                $this->sendPatientPlanAssignStatusEmail($data);
            }
            return redirect()->route('admin.doctor.plan.assign',['plan_id' => $assign->plan_id])->with('success', 'Plan assign update successfully !');
		} else {
            return redirect()->back()->with('error', 'Plan assign data not found !');
		}	
	}
    public function feedback(Request $request, $plan_id, $id) {
        $assign = DoctorPlanAssign::with(['plan','feedback','user'])->where('id', $id)->first();
        $graph = [];
        $graph_color_code = config('custom.feedback_graph_color_code');
        $assign->feedback->map(function ($feedback) {
            $feedback->graph = $this->feedbackGraphData($feedback);
        }); 
        // dd($assign); 
        return view('admin.doctor.plan-assign.feedback', compact('assign'));
    }
    protected function feedbackGraphData($feedback) {
        $count = 0;
        if($feedback->history) {
            $sortedHistory = isset($feedback->history)
                                ? collect($feedback->history)->sortBy('updated_at')->values()->all()
                                : [];
            foreach($sortedHistory as $history) {
                $graph['date'][] =  date('d M', strtotime($history['updated_at']));
                if($history['answer']) {
                    foreach($history['answer'] as $hk=>$ans) {
                        $graph[$hk][] = $ans != null ? (int) $ans : 0;
                    }
                }
                $count++;
            }
        }    
        $graph['date'][] =  date('d M', strtotime($feedback->updated_at));
        if($feedback['answer']) {
            foreach($feedback['answer'] as $fk=>$ans) {
                $graph[$fk][] = $ans != null ? (int) $ans : 0;
            }
        }
        return $graph;
    }
}
