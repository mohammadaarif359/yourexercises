<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CmsPage;
use App\Models\Inquiry;
use App\Models\DemoInquiry;
use App\Models\Role;
use App\Models\DoctorProfile;
use Validator;

class PageController extends Controller
{
    public function home() {
        return view('web_new.home');
    }

	public function about() {
        return view('web_new.about');
    }
	public function pricing() {
        return view('web_new.pricing');
    }
	public function demo() {
        return view('web_new.demo');
    }
	public function contact() {
        return view('web_new.contact');
    }
	public function privacyPolicy() {
        return view('web_new.privacy-policy');
    }
	public function termsCondition() {
       return view('web_new.terms-condition');
    }
	public function features() {
        return view('web_new.features');
    }
	public function featureDetail($slug) {
		$feature_pages = config('custom.feature_pages');
		if($feature_pages && array_key_exists($slug, $feature_pages)) {
        	return view('web_new.feature.'.$slug);
		} else {
			abort(404);
		}
    }
	public function featureDummy() {
        return view('web_new.feature-detail');
    }
	public function signIn(Request $request) {
		$doctor_uuid = $request->get('doctor_uuid') ?? null;
		$roles = Role::where('name','doctor')->pluck('display_name','id')->toArray(); 
		return view('web_new.sign-in', compact('roles','doctor_uuid'));
    }
	public function demoInquiry(Request $request) {
		$validate=Validator::make($request->all(), [
            'name' => 'required',
			'email' => 'required|email',
			'phone' => 'nullable',
			'preferred_time' => 'required',
			'designation' => 'required',
        ]);
		if ($validate->fails()) {
			return response()->json(['error'=>$validate->errors()]);
        }
		else {
			$inquiry = DemoInquiry::create([
				'name' => $request['name'],
				'email' =>  $request['email'],
				'phone' => $request['phone'],
				'preferred_time' => $request['preferred_time'],
				'designation' => $request['designation'],
				'clinic_name' => $request['clinic_name'],
				'city' => $request['city'] ?? null
			]);
			if($inquiry) {
				return response()->json(['message'=>'demo Inquiry has been send successfully.we will connect you soon.','code'=>200]);
			}
		}
	}
	public function contactInquiry(Request $request)
	{
		$validate=Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|digits_between:8,12',
			'message' => 'required',
        ]);
		if ($validate->fails()) {
			return response()->json(['error'=>$validate->errors()]);
        }
		else {
			$inquiry = Inquiry::create([
				'name' => $request['name'],
				'mobile' =>  $request['mobile'],
				'message' => $request['message']
			]);
			if($inquiry) {
				return response()->json(['success'=>'Inquiry has been send successfully.we will connect you soon.','code'=>200]);
			}
		}
	}
	public function clinic(Request $request) {
		$search = $request->get('search');
		$clinics = DoctorProfile::with('user')
			->when(!empty($search), function($q) use($search){
				return $q->where('clinic_name','like','%'.$search.'%')
				->orWhereHas('user', function($qy) use($search){
					$qy->where('name','like','%'.$search.'%');
				});
			})->where('is_verified',1)->where('ye_directory', 1)->get();
		return view('web_new.clinic.index', compact('clinics'));
	}
	public function clinicDetail($slug) {
		$data = DoctorProfile::with('user')->withCount('doctor_patient')->where('slug',$slug)->where('is_verified',1)->first();
		if($data) {
			$doctor_page = 1;
			return view('web_new.clinic.detail', compact('data','doctor_page'));
		} else {
			abort(404);
		}
	}
}
