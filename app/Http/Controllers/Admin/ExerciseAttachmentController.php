<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attachment;
use App\Traits\AuthCode;
use App\Traits\CommonCode;
use DB;
use DataTables;
use Carbon\Carbon;
use Validator;
use File;

class ExerciseAttachmentController extends Controller
{
    use AuthCode,CommonCode;
	public function index(Request $request, $exercise_id) {
		if ($request->ajax()) {
			$results = Attachment::where('attachable_id',$exercise_id)->where('attachable_type','App\Models\Exercise')->get();
			return Datatables::of($results)
				->addColumn('image_url', function ($data) {
					if($data->image_url) {
						return '<img src="'.$data->image_url.'" class="img img-response" height="100px" width="120px">';
					}
					return '';
				})->addColumn('action', function ($data) {
					$btn = '<a href="/admin/exercise/attachment/edit/'.$data->id.'" class="" title="Edit"><i class="fa fa-edit"></i></a>
					        <a href="/admin/exercise/attachment/delete/'.$data->id.'" class="" title="Delete"><i class="fa fa-trash"></i></a>';
					return $btn;
				})->editColumn('created_at', function ($data) {
					return [
						'display' => Carbon::parse($data->created_at)->format('d-m-Y h:i A'),
						'timestamp' => $data->created_at
					];
				})->editColumn('status', function ($data) {
					return $data->is_active == 1 ? 'Active' : 'Deactive';
				})->rawColumns(['image_url', 'action'])->make(true);
		}
		return view('admin.exercise.attachment.list', compact('exercise_id'));
	}
	public function store(Request $request) {
		$request_data = $request->all(); 
		$request->validate([
			'exercise_id' => 'required|exists:exercises,id',
			'image.0' => 'required',
			'image.*' => 'required|mimes:jpeg,jpg,png',
		]);
		for($i=0;$i<count($request_data['image']);$i++) {
			$image = $this->uploadImg($request_data['image'][$i], 'exercise');
			$attachment = Attachment::updateOrCreate([
				'image' => $image,
				'path' => 'exercise',
				'attachable_id' => $request_data['exercise_id'],
				'attachable_type' => 'App\Models\Exercise',
				'created_by' => Auth::user()->id,
			]);
		}
		return redirect()->back()->with('success', 'Exercise image updated successfully !');
	}
	public function edit(Request $request, $id) {
		$data = Attachment::where('id',$id)->first();
		if($data) {
			return view('admin.exercise.attachment.edit', compact('data'));
		} else {
			abort(404);
		}
	}
	public function update(Request $request) {
		$request_data = $request->all(); 
		$request->validate([
			'id' => 'required|exists:attachments,id',
			'image' => 'required|mimes:jpeg,jpg,png'
		]);
		$image = null;
		if($request->hasFile('image')) {
			$image = $this->uploadImg($request->image,'exercise');
		}
		$data = Attachment::where('id', $request_data['id'])->first();
		$data->image = $image;
		$data->save();
		return redirect()->route('admin.exercise.attachment',['exercise_id' => $data->attachable_id])->with('success', 'Exercise image updated successfully !');
	}
	public function delete(Request $request, $id) {
		$data = Attachment::where('id',$id)->first();
		if($data) {
			$data->delete();
			return redirect()->back()->with('success', 'Exercise image deleted successfully !');
		} else {
			return redirect()->back()->with('error', 'Failed to delete exercise image!');
		}
	}	
}
