<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserDevice;
use App\Models\Notification;
use App\Traits\AuthCode;

class NotificationController extends Controller
{
    use AuthCode;
	public function index(Request $request) {
		
		$keyword = isset($request->keyword) ?  $request->keyword : '';
		$notifications = Notification::when(!empty($keyword),function ($q) use($keyword){
			               return $q->where('title', 'like', '%' . $keyword . '%');
						})->orderBy('id', 'Desc')->paginate(1);
		return view('admin.notification.list',compact('notifications','keyword'));
	}
	public function add() {
		return view('admin.notification.add');
	}
	public function store(Request $request) {
		$request_data = $request->all();
		$request->validate([
			'title'    => 'required',
            'message'   => 'required',
            'image'   => 'nullable|mimes:jpeg,jpg,png',
		]);
		$file_name = null;
		if($request->hasFile('image')) {
			$file_name = $this->uploadImg($request->image,'notifications');
		}
		$notification = Notification::create([
			'title'=>$request_data['title'],
			'message'=>$request_data['message'],
			'image'=>$file_name,
			'status'=>$request_data['status'] 
		]);
		if($notification->status == 1) {
			$userDevice = New UserDevice();
			$userDevice->sendPush(null, $notification->message, $notification['data'], $notification->title);
		}
		return redirect()->route('admin.notification')->with('success', 'Notification send Successfully !');
	}
	public function edit($id) {
		$notification = Notification::where('id',$id)->first();
		if($notification) {
			return view('admin.notification.edit',compact('notification'));
		} else {
			abort(404);
		}
	}
	public function update(Request $request) {
		$request_data = $request->all();
		$request->validate([
			'title'    => 'required|regex:/^[\pL\s]+$/u',
            'message'   => 'required',
            'image'   => 'nullable|mimes:jpeg,jpg,png',
		]);
		$file_name = null;
		if($request->hasFile('image')) {
			$file_name = $this->uploadImg($request->image,'notifications');
		}
		$notification = Notification::updateOrCreate(
		[	'id' =>$request_data['id']
		],[
			'title'=>$request_data['title'],
			'message'=>$request_data['message'],
			'image'=>$file_name,
			'status'=>$request_data['status'] 
		]);
		if($notification->status == 1) {
			$userDevice = New UserDevice();
			$userDevice->sendPush(null, $notification->message, $notification['data'], $notification->title, $notification->image_url);
		}
		return redirect()->route('admin.notification')->with('success', 'Notification send Successfully !');
	}
	public function delete($id) {
		$notification = Notification::where('id',$id)->first();
		if($notification) {
			$notification->delete();
			return redirect()->back()->with('success', 'Notification deleted successfully !');
		} else {
			return redirect()->back()->with('error', 'Notification not found !');
			abort(404);
		}	
	}
}
