<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\AuthCode;
use Validator;

class RegisterController extends Controller
{
    
	use AuthCode;
    public function register(Request $request) {
		$request_data = $request->all();
		$validate=Validator::make($request->all(), [
            'name'    => 'required|regex:/^[\pL\s]+$/u',
            'email'   => 'required|email|unique:users,email',
            'mobile'  => 'required|unique:users,mobile',
			'password'=> 'required|min:6',
			'role'	  => 'required',	
			'profile_photo' => 'nullable|mimes:jpeg,jpg,png',
        ]);
		if ($validate->fails()) {
			return response()->json(['error'=>$validate->errors()]);
        }
	
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
		return response()->json(['message'=>'User register Successfully now you can login to access our features!.','code'=>200]);
	}
}
