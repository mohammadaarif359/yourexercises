<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Exercise;
use App\Models\Plan;
use App\Models\PlanDetail;
use App\Models\DoctorPlan;
use App\Models\DoctorPlanDetail;
use App\Models\PlanAssignFeedback;
use App\Traits\AuthCode;
use App\Traits\CommonCode;
use App\Traits\DoctorExerciseCode;
use DB;
use DataTables;
use Carbon\Carbon;
use Validator;

class DoctorPlanController extends Controller
{
    use AuthCode,CommonCode,DoctorExerciseCode;
	protected $doctor_id;
	protected $doctor_user_id;
	
	public function __construct() {
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
		if ($request->ajax()) {
			$doctor_user_id = $this->doctor_user_id;
			$results = DoctorPlan::withCount('plan_assign')->where('created_by', $doctor_user_id)->get();
			return Datatables::of($results)
				->addColumn('action', function ($data) {
					$btn = '<a href="/admin/doctor/plan/edit/'.$data->id.'" class="" title="Edit"><i class="fa fa-edit"></i></a>
					<a href="/admin/doctor/plan/'.$data->id.'/assign" target="_blank" class="" title="Assign"><i class="fa fa-user"></i></a>';
					if (!empty($data->pdf_url)) {
						$btn .= ' <a href='.$data->pdf_url.' target="_blank" title="View PDF"><i class="fa fa-file-pdf"></i></a>';
					} else {
						$btn .= ' <a href="/admin/doctor/plan/pdf/'.$data->id.'" title="Generate PDF"><i class="fa fa-file-alt"></i></a>';
					}
					return $btn;
				})->editColumn('created_at', function ($data) {
					return [
						'display' => Carbon::parse($data->created_at)->format('d-m-Y h:i A'),
						'timestamp' => $data->created_at
					];
				})->editColumn('status', function ($data) {
					return $data->is_active == 1 ? 'Active' : 'Deactive';
				})->addColumn('image_url', function ($data) {
					if($data->image_url) {
						return '<a href="'.$data->image_url.'" target="_blank"><img src="'.$data->image_url.'" class="img img-response" height="60px" width="100px">';
					}
					return '';
				})->rawColumns(['image_url', 'action'])->make(true);
		}
		return view('admin.doctor.plan.list');
	}
	public function add(Request $request) {
		$plan_id = $request->get('plan_id') ?? 0;
		$categories = Category::pluck('name','id')->ToArray();
		$adminPlans = Plan::where('is_active',1)->get();
		$plan = Plan::where('id', $plan_id)->with('plan_detail')->first();
		return view('admin.doctor.plan.add-new', compact('categories', 'adminPlans','plan', 'plan_id'));
    }
	public function store(Request $request) {
		$request_data = $request->all();
		
		$validator = $this->validateRequest($request);
		
		if ($validator->fails()) {
			return response()->json([
				'status' => 'Bad request',
				'response' => [],
				'validation_error_responce' => $validator->errors(),
				'code' => 404,
				'pocode' => "PO404",
				'postatus' => "Bad Request",
			],200);
		}

		$admin_plan = null;
		if($request_data['plan_id']) {
			$admin_plan = Plan::where('id', $request_data['plan_id'])->first();
		}

		$image = null;
		if ($request->hasFile('image')) {
			$image = $this->uploadImg($request->image, 'doctor/plan');
		} else if($admin_plan && $admin_plan['image']) {
			$image = $this->copyImg($admin_plan->image, 'public/plan', 'public/doctor/plan');
		}
	
		$plan = DoctorPlan::create([
			'plan_id' => $request_data['plan_id'] ?? null,
			'name' => $request_data['name'],
			'description' => $request_data['description'],
			'image' => $image,
			'is_active' => $request_data['is_active'],
			'created_by' => Auth::user()->id
		]);
		$this->savePlanDeatils($request_data,$plan->id);
		return response()->json([
			'status' => 'Ok',
			'response' => [],
			'code' => 200,
			'pocode' => "PO200",
			'postatus' => "Plan created successfully",
		],200);
	}
	protected function savePlanDeatils($request_data, $plan_id) {
		DoctorPlanDetail::where('doctor_plan_id', $plan_id)->delete();
		$data = $request_data['detail'];
		$data['exercise_id'] = $data['select_exercise_id'];
		for($i=0;$i<count($data['exercise_id']);$i++) {
			// if select the admin exercise first create in own account then attach to plan
			if(isset($data['is_admin'][$i]) && $data['is_admin'][$i] == 1) {
				$admin_exercise = Exercise::where('id', $data['exercise_id'][$i])->first();
				$admin_exercise['exercise_id'] = $data['exercise_id'][$i];
				
				$exerise_parameter = config('custom.exercise_parameter_with_category');
				foreach($exerise_parameter as $param) {
					if(in_array($param,['category_id','subcategory_id'])) {
						$admin_exercise[$param] = [$data[$param][$i]]; 
					} else {
						$admin_exercise[$param] = $data[$param][$i];
					}
				}
				
				$result = $this->exerciseStore($admin_exercise);
				if($result) {
					$data['exercise_id'][$i] = $result->id;
				}
			}
			$saveDetail = DoctorPlanDetail::create([
				'doctor_plan_id' => $plan_id,
				'category_id' => $data['category_id'][$i] ?? null,
				'subcategory_id' => $data['subcategory_id'][$i] ?? null,
				// 'exercise_id' => $data['exercise_id'][$i],
				'doctor_exercise_id' => $data['exercise_id'][$i],
				'reps' => $data['reps'][$i] ?? null,
				'hold' => $data['hold'][$i] ?? null,
				'complete' => $data['complete'][$i] ?? null,
				'perform' => $data['perform'][$i] ?? null,
				'frequency' => $data['frequency'][$i] ?? null,
				'times' => $data['times'][$i] ?? null,
				'created_by' => Auth::user()->id,
				'start_date' => $data['start_date'][$i] ?? null,
				'end_date' => $data['end_date'][$i] ?? null,
				'next_date' => $data['start_date'][$i] ?? null,
				'progression_frequency' => $data['progression_frequency'][$i] ?? null,
				'increase_per' => $data['increase_per'][$i] ?? null,
				'apply_rating' => $data['apply_rating'][$i] ?? null,
				'progression_status' => $data['start_date'][$i] ? 'pending' : null
			]);
		}
	}
	public function progression() {
	    $today = Carbon::now()->format('Y-m-d');
	    $plans = DoctorPlan::whereHas('doctor_plan_detail', function($q) use ($today) {
                    $q->where('next_date', $today);
                    $q->whereIn('progression_status', ['pending','in_progress']);
                })->whereHas('plan_assign', function($q) {
                    $q->where('status', 'ongoing');
                })->with(['doctor_plan_detail' => function($q) use ($today) {
                    $q->where('next_date', $today);
                    $q->whereIn('progression_status', ['pending','in_progress']);
                }])->get();
        foreach($plans as $k => $plan) {
            $is_update = false; 
            foreach($plan['doctor_plan_detail'] as $detail) {
                $rating_match = PlanAssignFeedback::Where('plan_id', $plan->id)->where('exercise_id', $detail->doctor_exercise_id)->where('rating', '>=', $detail->apply_rating)->first();
                if($rating_match) {
                    $is_update = true;
                    $max_progession = config('custom.max_progession');
                    $reps = (int) $detail->reps + (($detail->reps * $detail->increase_per) / 100);
                    $hold = (int) $detail->hold + (($detail->hold * $detail->increase_per) / 100);
                    $complete = (int) $detail->complete + (($detail->complete * $detail->increase_per) / 100);
                    $perform = (int) $detail->perform + (($detail->perform * $detail->increase_per) / 100);
                    
                    
                    $new_history = [
                        'date'     => $detail->next_date ? $detail->next_date : $detail->start_date,
                        'reps'     => $detail->reps,
                        'hold'     => $detail->hold,
                        'complete' => $detail->complete,
                        'perform'  => $detail->perform,
                    ];
                    
                    $progression_history = $detail->progression_history ?? [];
                    $progression_history[] = $new_history;
                    $prop_next_date = Carbon::today()->addDays($detail->progression_frequency);
                    $prop_end_date = Carbon::parse($detail->end_date)->startOfDay();
                    
                    $detail->reps     = min((int)ceil($reps), $max_progession['reps']);
                    $detail->hold     = min((int)ceil($hold), $max_progession['hold']);
                    $detail->complete = min((int)ceil($complete), $max_progession['complete']);
                    $detail->perform  = min((int)ceil($perform), $max_progession['perform']);
                    $detail->progression_history = $progression_history;
                    $detail->progression_last_update = $today;
                    
                    if ($prop_next_date->lessThanOrEqualTo($prop_end_date)) {
                        $detail->next_date = $prop_next_date->format('Y-m-d');
                        $detail->progression_status = 'in_progress';
                    } else {
                        $detail->progression_status = 'completed';
                    }
                    $detail->save();
                }
            }
            // re-gengerate pdf
            if($is_update) {
                $updated_plan = DoctorPlan::find($plan->id);
                $this->createDoctorPlanPdf($updated_plan);
                echo "update plan", $updated_plan->id;
                echo "<br/>";
            }
        }
        echo "final success";
	}
	public function edit($id) {
		$data = DoctorPlan::with('doctor_plan_detail')->find($id);
		if ($data) {
			$categories = Category::pluck('name', 'id')->toArray();
			return view('admin.doctor.plan.edit', compact('data', 'categories'));
		} else {
			abort(404);
		}
	}
	public function update(Request $request) {
		$request_data = $request->all();
		$validator = $this->validateRequest($request);
		
		if ($validator->fails()) {
			return response()->json([
				'status' => 'Bad request',
				'response' => [],
				'validation_error_responce' => $validator->errors(),
				'code' => 404,
				'pocode' => "PO404",
				'postatus' => "Bad Request",
			],200);
		}
		
		$file_name = null;
		if($request->hasFile('image')) {
			$file_name = $this->uploadImg($request->image,'doctor/plan');
		}
		$data = DoctorPlan::where('id',$request->id)->first();
		if($data) {
			$data->plan_id = $request_data['plan_id'] ?? null;
			$data->name = $request_data['name'];
			$data->description = $request_data['description'];
			$data->image = !empty($file_name) ? $file_name : $data->image;
			$data->is_active = $request_data['is_active'];
			$data->save();

			$this->savePlanDeatils($request_data,$data->id);
			
			return response()->json([
				'status' => 'Ok',
				'response' => [],
				'code' => 200,
				'pocode' => "PO200",
				'postatus' => "Plan update successfully",
			],200);
		} else {
			return response()->json([
				'status' => 'Server error',
				'response' => [],
				'code' => 500,
				'pocode' => "PO500",
				'postatus' => "Failer to update plan",
			],200);
		}	
	}

	public function export(Request $request) {
		$query = DoctorPlan::withCount('plan_assign')
			->where('created_by', $this->doctor_user_id)->get()
			->map(function ($data) {
				return [
					'id' => $data->id,
					'name' => $data->name,
					'status' => $data->is_active === 1 ? 'Active' : 'Deactive',
					'plan_assign_count' => $data->plan_assign_count,
					'created_at' => $data->created_at,
				];
			});
		$heading = array("id","name","status","assign users","created_at");
		return $this->exportModule('DoctorPlan',$query,$heading);
	}

	protected function validateRequest(Request $request) {
		$validator = Validator::make($request->all(),[
			'name' => 'required',
			'description' => 'nullable',
			'image' => 'nullable|mimes:jpeg,jpg,png',
			'is_active' => 'required|boolean',
			'detail.category_id.*' => 'required',
			'detail.subcategory_id.*' => 'required',
			// 'detail.exercise_id.*' => 'required',
			'detail.select_exercise_id.*' => 'required',
			'detail.reps.*' => 'required',
			'detail.hold.*' => 'required',
			'detail.complete.*' => 'required',
			'detail.perform.*' => 'required',
			'detail.frequency.*' => 'required',
			'detail.times.*' => 'required',
			
			// progession fields requoired if start_date given
            'detail.start_date.*'           => 'nullable|date|after:today',
            'detail.end_date.*'             => 'required_with:detail.start_date.*|nullable|date|after:detail.start_date.*',
            'detail.progression_frequency.*'=> 'required_with:detail.start_date.*|nullable|integer',
            'detail.increase_per.*'         => 'required_with:detail.start_date.*|nullable|numeric',
            'detail.apply_rating.*'         => 'required_with:detail.start_date.*|nullable|numeric',
		],[
			'detail.category_id.*.required' => 'The category id field is required',
			'detail.subcategory_id.*.required' => 'The subcategory id field is required',
			// 'detail.exercise_id.*.required' => 'The exercise id field is required',
			'detail.select_exercise_id.*.required' => 'The exercise id field is required',
			'detail.reps.*.required' => 'This reps field is required',
			'detail.hold.*.required' => 'This hold field is required',
			'detail.complete.*.required' => 'This complete field is required',
			'detail.perform.*.required' => 'This perform field is required',
			'detail.frequency.*.required' => 'This frequency field is required',
			'detail.times.*.required' => 'This times field is required',
			
			// progession fileds message
        	'detail.start_date.*.date' => 'The start date must in date format',
        	'detail.end_date.*.required_with' => 'The end date is required',
            'detail.progression_frequency.*.required_with' => 'Progression frequency is required',
            'detail.increase_per.*.required_with' => 'Increase per is required',
            'detail.apply_rating.*.required_with' => 'Apply rating is required',
		]);
		return $validator;
	}
	public function pdf(Request $request, $id) {
        $query = $request->get('view');
        $plan = DoctorPlan::where('id', $id)->first();
		if($plan) {
			if($query) {
				return view('admin.doctor.plan.pdf', compact('plan'));
			} else {
				$this->createDoctorPlanPdf($plan);
				return redirect()->back()->with('success', 'Plan pdf generate successfully !');
			}
		}
		abort(404);
    }
}
