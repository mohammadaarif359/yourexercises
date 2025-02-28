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
		$user_id = Auth::user()->id ?? 2;
		dd(Auth::user()->roles);
		$data = DoctorProfile::where('user_id', $user_id)->first();
        return view('web_new.doctor.profile', compact('user_id', 'data'));
	}
	public function profileSave(Request $request) {
		$user_id = Auth::user()->id ?? 2;
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
	public function register(Request $request) {
		$request_data = $request->all();
		$request->validate([
			'name'    => 'required|regex:/^[\pL\s]+$/u',
            'email'   => 'required|email|unique:users,email',
            'mobile'  => 'required|unique:users,mobile',
			'password'=> 'required|min:6',
			'role'	  => 'required',	
			'profile_photo' => 'nullable|mimes:jpeg,jpg,png',
		]);
		$file_name = null;
		if($request->hasFile('profile_photo')) {
			$file_name = $this->uploadImg($request->profile_photo,'users');
		}
		$user = User::create([
			'name'=>$request_data['name'],
			'email'=>trim($request_data['email']),
			'mobile'=>$request_data['mobile'],
			'status'=> 1,
			'password'=>bcrypt($request_data['password']),
			'profile_photo'=>$file_name,
		]);
		// attach role
		$user->attachRole($request->role);
		return back()->with('success', 'User register Successfully now you can login to access our features!');
	}
}
