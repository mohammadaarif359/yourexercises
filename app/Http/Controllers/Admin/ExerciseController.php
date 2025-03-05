<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Exercise;
use App\Models\ExerciseCategory;
use App\Models\Attachment;
use App\Traits\AuthCode;
use App\Traits\CommonCode;
use DB;
use DataTables;
use Carbon\Carbon;
use File;

class ExerciseController extends Controller
{
    use AuthCode,CommonCode;
	public function index(Request $request) {
		if ($request->ajax()) {
			$results = Exercise::with(['exercise_category','exercise_category.category','exercise_category.subcategory'])->get();
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
					$btn = '<a href="/admin/exercise/edit/'.$data->id.'" class="" title="Edit"><i class="fa fa-edit"></i></a>
					<a href="/admin/exercise/attachment/'.$data->id.'" class="" title="Images"><i class="fa fa-image"></i></a>';
					return $btn;
				})->editColumn('created_at', function ($data) {
					return [
						'display' => Carbon::parse($data->created_at)->format('d-m-Y h:i A'),
						'timestamp' => $data->created_at
					];
				})->editColumn('status', function ($data) {
					return $data->is_active == 1 ? 'Active' : 'Deactive';
				})->editColumn('is_private', function ($data) {
					return $data->is_private == 1 ? 'Yes' : 'No';
				})->addColumn('image_url', function ($data) {
					if($data->image_url) {
						return '<a href="'.$data->image_url.'" target="_blank"><img src="'.$data->image_url.'" class="img img-response" height="60px" width="100px">';
					}
					return '';
				})->rawColumns(['image_url', 'action'])->make(true);
		}
		return view('admin.exercise.list');
	}
	public function add() {
		$categories = Category::pluck('name','id')->ToArray();
		$cat_sub_multi_js = true;
		return view('admin.exercise.add', compact('categories', 'cat_sub_multi_js'));
	}

	public function store(Request $request) {
		$request_data = $request->all();
		// validate
		$this->validateRequest($request);

		$image = null;
		if ($request->hasFile('image')) {
			$image = $this->uploadImg($request->image, 'exercise');
		}
	
		$exercise = Exercise::create([
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
			'is_private' => $request_data['is_private'] ?? false,
			'created_by' => Auth::user()->id,
		]);
		$this->saveCategory($request_data,$exercise->id);
	
		return redirect()->route('admin.exercise')->with('success', 'Exercise created successfully!');
	}

	protected function saveCategory($request_data, $exercise_id) {
		ExerciseCategory::where('exercise_id', $exercise_id)->delete();
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
							ExerciseCategory::create([
								'exercise_id' => $exercise_id,
								'category_id' => $cat,
								'subcategory_id' => $subcat
							]);
						}
					}
				}
			}
		}
	}
	
	public function edit($id) {
		$data = Exercise::with('exercise_category','attachments')->find($id);
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
			$cat_sub_multi_js = true;
			return view('admin.exercise.edit', compact('data', 'categories', 'subcategories', 'old_category_id','old_subcategory_id', 'cat_sub_multi_js'));
		} else {
			abort(404);
		}
	}
	
	public function update(Request $request) {
		$request_data = $request->all();
		$this->validateRequest($request);
		
		$file_name = null;
		if($request->hasFile('image')) {
			$file_name = $this->uploadImg($request->image,'exercise');
		}
		$data = Exercise::where('id',$request->id)->first();
		if($data) {
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
			$data->is_private = $request_data['is_private'];
			$data->save();
			$this->saveCategory($request_data,$data->id);

			return redirect()->route('admin.exercise')->with('success', 'Exercise updated successfully !');
		} else {
			return redirect()->back()->with('error', 'Failer to updated exercise !');
		}	
	}	
	public function export(Request $request) {
		$query = Exercise::select("id","name","slug","description","status","created_at")->get();
		$heading = array("id","name","slug","description","status","created_at");
		return $this->exportModule($model = null,$query,$heading);
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
			'is_private' => 'boolean',
		]);
	}
	public function bySubcategory(Request $request) {
		$request->subcategory_id;
		$request->is_private;
		$query = Exercise::whereHas('exercise_category.subcategory', function ($query) use ($request) {
			$query->whereIn('id', $request->subcategory_id);
		});

		if ($request->has('is_private') && !empty($request->is_private)) {
			$query->where('is_private', $request->is_private);
		}
		$data = $query->get();
		return response()->json($data);
	}
}
