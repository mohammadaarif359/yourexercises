<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Exercise;
use App\Models\DoctorExercise;
use App\Models\ExerciseCategory;
use App\Models\DoctorExerciseCategory;
use App\Models\Attachment;
use App\Traits\AuthCode;
use App\Traits\CommonCode;
use DB;
use DataTables;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\{Storage};

class DoctorExerciseController extends Controller
{
    use AuthCode,CommonCode;
	public function index(Request $request) {
        if ($request->ajax()) {
			$results = DoctorExercise::with(['exercise_category','exercise_category.category','exercise_category.subcategory'])->get();
			return Datatables::of($results)
				->addColumn('category', function ($data) {
					if ($data->exercise_category) {
						$categories = '';
						foreach ($data->exercise_category as $cat) {
							if($cat->category) {
								$categories .= $cat->category->name. ', ';
							}
						}
						return rtrim($categories, ', ');
					}
					return '';
				})->addColumn('subcategory', function ($data) {
					if ($data->exercise_category) {
						$subcategories = '';
						foreach ($data->exercise_category as $cat) {
							if($cat->subcategory) {
								$subcategories .= $cat->subcategory->name. ', ';
							}
						}
						return rtrim($subcategories, ', ');
					}
					return '';
				})->addColumn('action', function ($data) {
					$btn = '<a href="/admin/doctor/exercise/edit/'.$data->id.'" class="" title="Edit"><i class="fa fa-edit"></i></a>
					<a href="/admin/doctor/exercise/attachment/'.$data->id.'" class="" title="Images"><i class="fa fa-image"></i></a>';
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
				})->rawColumns(['image_url', 'action'])->make(true);;
		}
		return view('admin.doctor.exercise.list');
	}
	public function add() {
		$categories = Category::pluck('name','id')->ToArray();
		$cat_sub_multi_js = true;
		return view('admin.doctor.exercise.add', compact('categories', 'cat_sub_multi_js'));
	}

	public function store(Request $request) {
		$request_data = $request->all();
		// validate
		$this->validateRequest($request);
		$admnExerise = null;
		if($request_data['exercise_id']) {
			$admnExerise = Exercise::where('id', $request_data['exercise_id'])->with('attachments')->first();
		}
		$image = null;
		if ($request->hasFile('image')) {
			$image = $this->uploadImg($request->image, 'doctor/exercise');
		} else if($admnExerise['image']) {
			$image = $this->copyImg($admnExerise->image, 'public/exercise', 'public/doctor/exercise');
		}
		$exercise = DoctorExercise::create([
            'exercise_id' => $request_data['exercise_id'] ?? null,
			'name' => $request_data['name'],
			'description' => $request_data['description'],
			'image' => $image,
			'reps' => $request_data['reps'] ?? null,
			'hold' => $request_data['hold'] ?? null,
			'complete' => $request_data['complete'] ?? null,
			'perform' => $request_data['perform'] ?? null,
			'frequency' => $request_data['frequency'] ?? null,
			'times' => $request_data['times'] ?? null,
			'is_active' => $request_data['is_active'] ?? false,
			'created_by' => Auth::user()->id,
		]);
		$this->saveCategory($request_data,$exercise->id);

		if($admnExerise && $admnExerise['attachments']) {
			$this->saveAttachment($admnExerise['attachments'], $exercise->id);
		}
	
		return redirect()->route('admin.doctor.exercise')->with('success', 'Exercise created successfully!');
	}
	
	public function edit($id) {
		$data = DoctorExercise::with('exercise_category')->find($id);
		if ($data) {
			$old_category_id = [];
			$old_subcategory_id = [];
			foreach($data['exercise_category'] as $cat) {
				if(!in_array($cat->category_id,$old_category_id)) {
					$old_category_id[] = $cat->category_id;
				}
				$old_subcategory_id[] = $cat->subcategory_id; 
			}
			$categories = Category::pluck('name', 'id')->toArray();
			$subcategories = Subcategory::whereIn('category_id',$old_category_id)->pluck('name', 'id')->toArray();
			$exercises = Exercise::where('id', $data->exercise_id)->pluck('name', 'id')->toArray();
			$cat_sub_multi_js = true;
			return view('admin.doctor.exercise.edit', compact('data', 'categories', 'subcategories', 'old_category_id','old_subcategory_id','exercises', 'cat_sub_multi_js'));
		} else {
			abort(404);
		}
	}
	
	public function update(Request $request) {
		$request_data = $request->all();
		$this->validateRequest($request);
		
		$file_name = null;
		if($request->hasFile('image')) {
			$file_name = $this->uploadImg($request->image,'doctor/exercise');
		}
		$data = DoctorExercise::where('id',$request->id)->first();
		if($data) {
			$data->exercise_id = $request_data['exercise_id'] ?? null;
			$data->name = $request_data['name'];
			$data->description = $request_data['description'];
			$data->image = !empty($file_name) ? $file_name : $data->image;
			$data->reps = $request_data['reps'];
			$data->hold = $request_data['hold'];
			$data->complete = $request_data['complete'];
			$data->perform = $request_data['perform'];
			$data->frequency =  $request_data['frequency'] ?? null;
			$data->times = $request_data['times'];
			$data->is_active = $request_data['is_active'];
			$data->save();

			return redirect()->route('admin.doctor.exercise')->with('success', 'Exercise updated successfully !');
		} else {
			return redirect()->back()->with('error', 'Failer to updated exercise !');
		}	
	}

	public function export(Request $request) {
		$query = DoctorExercise::select("id","name","slug","description","status","created_at")->get();
		$heading = array("id","name","slug","description","status","created_at");
		return $this->exportModule($model = null,$query,$heading);
	}
	
	protected function saveCategory($request_data, $exercise_id) {
		DoctorExerciseCategory::where('doctor_exercise_id', $exercise_id)->delete();
		if (!empty($request_data['category_id']) && count($request_data['category_id']) > 0) {
			foreach ($request_data['category_id'] as $cat) {
				if (!empty($request_data['subcategory_id']) && count($request_data['subcategory_id']) > 0) {
					foreach ($request_data['subcategory_id'] as $subcat) {
						// Ensure subcategory belongs to the current category
						$subcategory = Subcategory::where('id', $subcat)
							->where('category_id', $cat)
							->first();
		
						if ($subcategory) {
							// Save a single row with the category and its subcategory
							DoctorExerciseCategory::create([
								'doctor_exercise_id' => $exercise_id,
								'category_id' => $cat,
								'subcategory_id' => $subcat
							]);
						}
					}
				}
			}
		}
	}

	protected function saveAttachment($attachments, $exercise_id) {
		foreach($attachments as $k=> $attachment) {
			if($attachment->is_active === 1) {
				$image = $this->copyImg($attachment->image, 'public/exercise', 'public/doctor/exercise');
				$attachment = Attachment::updateOrCreate([
					'image' => $image,
					'path' => 'doctor/exercise',
					'attachable_id' => $exercise_id,
					'attachable_type' => 'App\Models\DoctorExercise',
					'created_by' => Auth::user()->id,
				]);
			}
		}
	}

	public function validateRequest(Request $request) {
		$request->validate([
			'category_id' => 'required|array|min:1',
			'subcategory_id' => 'required|array|min:1',
			'name' => 'required',
			'description' => 'nullable',
			'image' => 'nullable|mimes:jpeg,jpg,png',
			'reps' => 'required|integer',
			'hold' => 'required|integer',
			'complete' => 'required|integer',
			'perform' => 'required|integer',
			'frequency' => 'nullable',
			'times' => 'required|string',
			'is_active' => 'boolean',
		]);
	}
	public function bySubcategory(Request $request) {
		$request->subcategory_id;
		$data = DoctorExercise::whereHas('exercise_category.subcategory', function ($query) use ($request) {
			$query->whereIn('id', $request->subcategory_id);
		})->get();
		return response()->json($data);
	}	
}
