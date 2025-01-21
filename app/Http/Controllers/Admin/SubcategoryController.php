<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Role;
use App\Traits\AuthCode;
use App\Traits\CommonCode;
use DB;
use DataTables;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class SubcategoryController extends Controller
{
    use AuthCode,CommonCode;
	public function index(Request $request) {
		$category_id = $request->get('category_id');
		if ($request->ajax()) {
			$subcategories = Subcategory::with('category')
			->when($category_id, function ($query) use ($category_id) {
                return $query->where('category_id', $category_id);
            })->get();
			return Datatables::of($subcategories)
				->addColumn('category_name', function ($data) {
					return $data->category->name ?? '';
				})->addColumn('action', function ($data) {
					$btn = '<a href="/admin/subcategory/edit/'.$data->id.'" class="" title="Edit"><i class="fa fa-edit"></i></a>';
					return $btn;
				})->editColumn('created_at', function ($data) {
					return [
						'display' => Carbon::parse($data->created_at)->format('d-m-Y h:i A'),
						'timestamp' => $data->created_at
					];
				})->editColumn('status', function ($data) {
					return $data->is_active == 1 ? 'Active' : 'Deactive';
				})
				->make(true);
		}
		return view('admin.subcategory.list', compact('category_id'));
	}
	public function add(Request $request) {
		$category_id = $request->get('category_id');
		$category = Category::pluck('name','id')->ToArray();
		return view('admin.subcategory.add', compact('category','category_id'));
	}
	public function store(Request $request) {
		$request_data = $request->all();
		$this->validateRequest($request);
		
		$image = null;
		if($request->hasFile('image')) {
			$image = $this->uploadImg($request->image,'subcategory');
		}
		$category = Subcategory::create([
			'category_id'=>$request_data['category_id'],
			'name'=>$request_data['name'],
			'slug'=>trim($request_data['slug']),
			'description'=>$request_data['description'],
			'is_active'=>isset($request_data['is_active']) ? $request_data['is_active'] : 0,
			'created_by'=>Auth::user()->id,
			'image'=>$image,
		]);
		return redirect()->route('admin.subcategory', ['category_id' => $request_data['category_id']])->with('success', 'Subcategory created Successfully !');
	}
	public function edit($id) {
		$data = Subcategory::where('id',$id)->first();
		if($data) {
			$category = Category::pluck('name','id')->ToArray();
			return view('admin.subcategory.edit',compact('data','category'));
		} else {
			abort(404);
		}
	}
	public function update(Request $request) {
		$request_data = $request->all();
		$this->validateRequest($request);
		
		$file_name = null;
		if($request->hasFile('image')) {
			$file_name = $this->uploadImg($request->image,'subcategory');
		}
		$category = Subcategory::where('id',$request->id)->first();
		if($category) {
			$category->name = $request_data['name'];
			$category->slug = trim($request_data['slug']);
			$category->description = trim($request_data['description']);
			$category->image = !empty($file_name) ?  $file_name : $category->image;
			$category->is_active = $request_data['is_active'];
			$category->save();
			return redirect()->route('admin.subcategory', ['category_id' => $request_data['category_id']])->with('success', 'Subcategory updated successfully !');
		} else {
			return redirect()->back()->with('error', 'Failer to updated subcategory !');
		}
		
	}
	public function export(Request $request) {
		$query = Subcategory::select("id","name","slug","description","is_active","created_at")->get();
		$heading = array("id","name","slug","description","status","created_at");
		return $this->exportModule('Subcategory',$query,$heading);
	}

	/*public function byCategory($category_id) {
		$data = Subcategory::where('category_id', $category_id)->pluck('name','id')->ToArray();
		return response()->json($data);
	}*/

	public function byCategory(Request $request) {
		$data = Subcategory::whereIn('category_id', $request->category_id)->pluck('name','id')->ToArray();
		return response()->json($data);
	}
	protected function validateRequest(Request $request) {
		$request->validate([
			'category_id' => 'required',
			'name'    => [
				'required',
				Rule::unique('subcategories')
					->where('category_id', $request->category_id)
					->ignore($request->id), // Ignore the current ID on update
			],
			'slug'   => 'required|unique:subcategories,slug,'.$request->id,
			'image' => 'nullable|mimes:jpeg,jpg,png',
			'is_active' => 'boolean',
		]);
	}	
}
