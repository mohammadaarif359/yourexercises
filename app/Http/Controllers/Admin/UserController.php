<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\DoctorProfile;
use App\Traits\AuthCode;
use App\Traits\CommonCode;
use DB;
use DataTables;
use Carbon\Carbon;

class UserController extends Controller
{
    use AuthCode,CommonCode;
	public function index(Request $request) {
		if ($request->ajax()) {
			$users =  User::with(['doctor_profile' => function ($q) {
					$q->withCount('doctor_patient'); // 👈 adds doctor_patient_count to doctor_profile
				}])->whereHas('roles', function ($q) {
					$q->where('name', 'doctor');
				})->orderBy('created_at', 'desc')->get();
			return Datatables::of($users)
				->addColumn('action', function ($user) {
					$btn = '<a href="/admin/user/edit/'.$user->id.'" class="" title="Edit"><i class="fa fa-edit"></i></a>
					<a href="/admin/user/profile/'.$user->id.'" class="" title="Doctor profile" target="_blank"><i class="fa fa-eye"></i></a>';
					return $btn;
				})->editColumn('created_at', function ($user) {
					return '<span>'.Carbon::parse($user->created_at)->format('d-m-Y').'</span><br>
							<small>'.Carbon::parse($user->created_at)->format('h:i A').'</small>';
				})->editColumn('created_at', function ($user) {
					return [
						'display' => Carbon::parse($user->created_at)->format('d-m-Y h:i A'),
						'timestamp' => $user->created_at
					];
				})->editColumn('status', function ($user) {
					return $user->status == 1 ? 'Active' : 'Deactive';
				})->editColumn('is_verified', function ($user) {
					return !empty($user->doctor_profile) && $user->doctor_profile->is_verified == 1 ? 'Verified' : 'Not Verified';
				})->addColumn('patient_count', function ($user) {
					return !empty($user->doctor_profile) ? $user->doctor_profile->doctor_patient_count : 0;
				})
				->make(true);
		}
		return view('admin.user.list');
	}
	public function add() {
		$roles = Role::where('name','doctor')->pluck('display_name','id')->toArray();
		return view('admin.user.add',compact('roles'));
	}
	public function store(Request $request) {
		$request_data = $request->all();
		$request->validate([
			'name'    => 'required',
            'email'   => 'required|email|unique:users,email',
            'mobile'  => 'required|numeric|digits_between:8,12|unique:users,mobile',
			'password'=> 'required|min:6|confirmed',
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
			'status'=>isset($request_data['status']) ? $request_data['status'] : 1,
			'password'=>bcrypt($request_data['password']),
			'profile_photo'=>$file_name,
		]);
		// attach role
		$user->attachRole($request->role);
		return redirect()->route('admin.user')->with('success', 'User created Successfully !');
	}
	public function edit($id) {
		$user = User::where('id',$id)->first();
		if($user) {
			$roles = Role::where('name','doctor')->pluck('name','id')->toArray();
			$old_role = [];
			if(!empty($user['roles'])) {
				$userRoles = $user['roles'];
				foreach($userRoles as $userRole) {
					$old_role[] = $userRole->id;
				}
				//$old_role = implode(",",$old_role);
			}
			return view('admin.user.edit',compact('user','roles','old_role'));
		} else {
			abort(404);
		}
	}
	public function update(Request $request) {
		$request_data = $request->all();
		$request->validate([
			'id' =>	'required',
			'name'    => 'required',
            'email'   => 'required|email|unique:users,email,'.$request->id,
            'mobile'  => 'required|numeric|digits_between:8,12|unique:users,mobile,'.$request->id,
			'password'=> 'nullable|confirmed',
			'profile_photo' => 'nullable|mimes:jpeg,jpg,png',
			'role'	  => 'required',
 			//'status'  => 'required|boolean',
		]);
		$file_name = null;
		if($request->hasFile('profile_photo')) {
			$file_name = $this->uploadImg($request->profile_photo,'users');
		}
		$user = User::where('id',$request->id)->first();
		if($user) {
			$user->name = $request_data['name'];
			$user->email = trim($request_data['email']);
			$user->mobile = $request_data['mobile'];
			$user->profile_photo = !empty($file_name) ?  $file_name : $user->profile_photo;
			if(!empty($request_data['password'])) {
				$user->password = bcrypt($request_data['password']);
			}
			$user->save();
			// delete old role and new attach
			DB::table('role_user')->where('user_id',$user->id)->delete();
			$user->attachRole($request->role);
			return redirect()->route('admin.user')->with('success', 'User updated successfully !');
		} else {
			return redirect()->back()->with('error', 'Failer to updated user !');
		}
		
	}
	public function delete($id) {
		$user = User::where('id',$id)->first();
		if($user) {
			$status = $this->deleteUserData($user);
			if($status) {
				return redirect()->back()->with('success', 'User deleted successfully !');
			} else {
				return redirect()->back()->with('error', 'Failed to delete user!');
			}
		} else {
			abort(404);
		}	
	}
	public function export(Request $request) {
		$query = User::with(['doctor_profile' => function ($q) {
					$q->withCount('doctor_patient'); // 👈 adds doctor_patient_count to doctor_profile
				}])->whereHas('roles', function ($q) {
					$q->where('name', 'doctor');
				})->get()->map(function ($user) {
				return [
					'id' => $user->id,
					'name' => $user->name,
					'email' => $user->email,
					'mobile' => $user->mobile,
					'status' => $user->status === 1 ? 'Active' : 'Deactive',
					'is_verified' => !empty($user->doctor_profile) && $user->doctor_profile->is_verified ? 'Verified' : 'Not Verified',
					'patient_count' => !empty($user->doctor_profile) ? $user->doctor_profile->doctor_patient_count : 0,  
					'created_at' => $user->created_at, // Handling potential null values
				];
			});
		$heading = array("id","name","email","mobile","status","verified","patient_count","created_at");
		return $this->exportModule($model = null,$query,$heading);
	}
	public function profile($user_id) {
		$data = DoctorProfile::where('user_id',$user_id)->first();
		if($data) {
			return view('admin.user.profile',compact('data'));
		} else {
			abort(404);
		}
	}
	public function profileVerify(Request $request) {
		$profile = DoctorProfile::where('user_id',$request->user_id)->first();
		if($profile) {
			$profile->is_verified = !$profile->is_verified;
			$profile->save();
			// send mail
			$data['name'] = $profile['user']['name'];
			$data['email'] = $profile['user']['email'];
			$data['clinic_name'] = $profile['clinic_name'];
			$data['message'] = trans('sms.doctor.profile.verified');
			$data['url'] = url('/clinic/'.$profile->slug);
			$this->sendDoctorProfileVerifiedMail($data);
			return redirect()->route('admin.user')->with('success', 'Profile verified successfully !');
		} else {
			return redirect()->back()->with('success', 'Profie not found !');
		}
	}
}
