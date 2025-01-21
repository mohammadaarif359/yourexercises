<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Role;
use App\Traits\AuthCode;
use App\Traits\CommonCode;
use DB;
use DataTables;
use Carbon\Carbon;

class CategoryController extends Controller
{
    use AuthCode,CommonCode;
	public function index(Request $request) {
		if ($request->ajax()) {
			$categories = Category::get();
			return Datatables::of($categories)
				->addColumn('action', function ($category) {
					$btn = '<a href="/admin/category/edit/'.$category->id.'" class="" title="Edit"><i class="fa fa-edit"></i></a>
					<a href="/admin/subcategory?category_id='.$category->id.'" class="" title="Subcategory"><i class="fa fa-eye"></i></a>';
					return $btn;
				})->editColumn('created_at', function ($category) {
					return [
						'display' => Carbon::parse($category->created_at)->format('d-m-Y h:i A'),
						'timestamp' => $category->created_at
					];
				})->editColumn('status', function ($category) {
					return $category->is_active == 1 ? 'Active' : 'Deactive';
				})
				->make(true);
		}
		return view('admin.category.list');
	}
	public function add() {
		return view('admin.category.add');
	}
	public function store(Request $request) {
		$request_data = $request->all();
		$this->validateRequest($request);

		$image = null;
		if($request->hasFile('image')) {
			$image = $this->uploadImg($request->image,'category');
		}
		$category = Category::create([
			'name'=>$request_data['name'],
			'slug'=>trim($request_data['slug']),
			'description'=>$request_data['description'],
			'is_active'=>isset($request_data['is_active']) ? $request_data['is_active'] : 0,
			'created_by'=>Auth::user()->id,
			'image'=>$image,
		]);
		return redirect()->route('admin.category')->with('success', 'Category created Successfully !');
	}
	public function edit($id) {
		$data = Category::where('id',$id)->first();
		if($data) {
			return view('admin.category.edit',compact('data'));
		} else {
			abort(404);
		}
	}
	public function update(Request $request) {
		$request_data = $request->all();
		$this->validateRequest($request);
		
		$file_name = null;
		if($request->hasFile('image')) {
			$file_name = $this->uploadImg($request->image,'category');
		}
		$category = Category::where('id',$request->id)->first();
		if($category) {
			$category->name = $request_data['name'];
			$category->slug = trim($request_data['slug']);
			$category->description = trim($request_data['description']);
			$category->image = !empty($file_name) ?  $file_name : $category->image;
			$category->is_active = $request_data['is_active'];
			$category->save();
			return redirect()->route('admin.category')->with('success', 'Category updated successfully !');
		} else {
			return redirect()->back()->with('error', 'Failer to updated category !');
		}
		
	}
	public function export(Request $request) {
		$query = Category::select("id","name","slug","description","is_active","created_at")->get();
		$heading = array("id","name","slug","description","status","created_at");
		return $this->exportModule('Category',$query,$heading);
	}
	protected function validateRequest(Request $request) {
		$request->validate([
			'name'    => 'required|unique:categories,name,'.$request->id,
			'slug'   => 'required|unique:categories,slug,'.$request->id,
			'image' => 'nullable|mimes:jpeg,jpg,png',
			'is_active' => 'boolean',
		]);
	}
}
