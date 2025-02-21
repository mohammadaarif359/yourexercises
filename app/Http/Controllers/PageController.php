<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CmsPage;
use App\Models\Inquiry;
use App\Models\DemoInquiry;
use Validator;

class PageController extends Controller
{
    public function home() {
        /*$page = CmsPage::where('slug','home')->where('status',1)->first();
		if($page) {
			return view('web.home',compact('page'));
		} else {
			abort(404);
		}*/
		return view('web_new.home');
    }

	public function about() {
        /*$page = CmsPage::where('slug','about')->where('status',1)->first();
		if($page) {
			return view('web.about',compact('page'));
		} else {
			abort(404);
		}*/
		return view('web_new.about');
    }
	public function pricing() {
        /*$page = CmsPage::where('slug','pricing')->where('status',1)->first();
		if($page) {
			return view('web.pricing',compact('page'));
		} else {
			abort(404);
		}*/
		return view('web_new.pricing');
    }
	public function demo() {
        /*$page = CmsPage::where('slug','demo')->where('status',1)->first();
		if($page) {
			return view('web.pricing',compact('page'));
		} else {
			abort(404);
		}*/
		return view('web_new.demo');
    }
	public function contact() {
        /*$page = CmsPage::where('slug','contact')->where('status',1)->first();
		if($page) {
			return view('web.contact',compact('page'));
		} else {
			abort(404);
		}*/
		return view('web_new.contact');
    }
	public function privacyPolicy() {
        /*$page = CmsPage::where('slug','privacy-policy')->where('status',1)->first();
		if($page) {
			return view('web.privacy-policy',compact('page'));
		} else {
			abort(404);
		}*/
		return view('web_new.privacy-policy');
    }
	public function termsCondition() {
        /*$page = CmsPage::where('slug','terms-condition')->where('status',1)->first();
		if($page) {
			return view('web.terms-condition',compact('page'));
		} else {
			abort(404);
		}*/
		return view('web_new.terms-condition');
    }
	public function features() {
        /*$page = CmsPage::where('slug','home')->where('status',1)->first();
		if($page) {
			return view('web.home',compact('page'));
		} else {
			abort(404);
		}*/
		return view('web_new.features');
    }
	public function featureDetail($slug) {
        /*$page = CmsPage::where('slug','home')->where('status',1)->first();
		if($page) {
			return view('web.home',compact('page'));
		} else {
			abort(404);
		}*/
		return view('web_new.feature-detail');
    }
	public function signIn() {
        /*$page = CmsPage::where('slug','home')->where('status',1)->first();
		if($page) {
			return view('web.home',compact('page'));
		} else {
			abort(404);
		}*/
		return view('web_new.sign-in');
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
}
