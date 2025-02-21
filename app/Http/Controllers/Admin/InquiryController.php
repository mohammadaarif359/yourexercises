<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DemoInquiry;
use DataTables;
use Carbon\Carbon;

class InquiryController extends Controller
{
    public function inquiryDemo(Request $request) {
        if ($request->ajax()) {
			$results = DemoInquiry::get();
			return Datatables::of($results)
				->addColumn('action', function ($data) {
					$btn = '<a href="/admin/doctor/plan/edit/'.$data->id.'" class="" title="Edit"><i class="fa fa-edit"></i></a>';
					return $btn;
				})->editColumn('created_at', function ($data) {
					return [
						'display' => Carbon::parse($data->created_at)->format('d-m-Y h:i A'),
						'timestamp' => $data->created_at
					];
				})->editColumn('city', function ($data) {
					return !empty($data->city) ? config('custom.canada_city')[$data->city] : null;
				})->editColumn('designation', function ($data) {
					return !empty($data->designation) ? config('custom.designation')[$data->designation] : null;
				})->make(true);
		}
		return view('admin.inquiry.demo.list');
	}
}
