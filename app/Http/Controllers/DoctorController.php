<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorProfile;
use Validator;
use Auth;
use App\Traits\AuthCode;
use App\Models\User;

class DoctorController extends Controller
{
    
	use AuthCode;
    public function profile(Request $request) {
		$user_id = Auth::user()->id;
		$data = DoctorProfile::where('user_id', $user_id)->first();
        return view('web_new.doctor.profile', compact('user_id', 'data'));
	}
	public function profileSave(Request $request) {
		$request->validate([
			'clinic_name'    => 'required|unique:doctor_profile,name,'.$request->id,
			'slug'   => 'required|unique:doctor_profile,slug,'.$request->id,
			'clinic_address' => 'required',
			'gender' => 'required',
			'dob' => 'required|date',
			'image' => 'nullable|mimes:jpeg,jpg,png',
			'logo' => 'nullable|mimes:png',
		]);
		$user_id = Auth::user()->id;
		$profile = DoctorProfile::where('user_id', $user_id)->first();
		$logo = null;
		if ($request->hasFile('logo')) {
			$logo = $this->uploadImg($request->logo, 'doctor/profile');
		} else if($profile && $profile['logo']) {
			$logo = $profile['logo'];
		}

		$image = null;
		if ($request->hasFile('image')) {
			$logo = $this->uploadImg($request->image, 'doctor/profile');
		} else if($profile && $profile['image']) {
			$image = $profile['image'];
		}

        $professional_info = [
            'specialization' => $request['professional_info']['specialization'],
            'experience' => $request['professional_info']['experience'],
            'qualification' => $request['professional_info']['qualification'],
            'affiliations' => $request['professional_info']['affiliations']
        ];
        $social_media = [
            'facebook' => $request['social_media']['facebook'],
            'instagram' => $request['social_media']['instagram'],
            'linkedin' => $request['social_media']['linkedin'],
            'pinterest' => $request['social_media']['pinterest'],
            'youtube' => $request['social_media']['youtube'],
            'tiktok' => $request['social_media']['tiktok'],
			'threads' => $request['social_media']['threads']
        ];
        $data = doctorProfile::updateOrCreate(
			[
				'user_id' => $user_id
			],
			[
				'clinic_name' => $request['clinic_name'],
				'slug' => $request['slug'],
				'clinic_address' => $request['clinic_address'],
				'description' => $request['description'],
				'logo' => $logo,
				'image' => $image,
				'gender' => $request['gender'],
				'dob' => $request['dob'],
				'clinic_phone_no' => $request['clinic_phone_no'],
                'professional_info' => $professional_info,
                'social_media' => $social_media,
			]
		);
		if($data) {
			return redirect()->route('home')->with('success', 'Profile update successfully !');
		}
		return redirect()->back()->with('errpr', 'Failer to updated profile !');
	}
}
