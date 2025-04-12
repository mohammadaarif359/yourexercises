<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\DoctorProfile;
use App\Models\PatientProfile;
use App\Traits\AuthCode;
use App\Traits\CommonCode;
use DB;
use DataTables;
use Carbon\Carbon;
use Auth;

class DoctorUserController extends Controller
{
    use AuthCode,CommonCode;
	public function index(Request $request) {
		if ($request->ajax()) {
			$doctor_id = Auth::user()->doctor_profile->id;

			$users = User::whereHas('patient_profile', function ($q) use($doctor_id) {
					$q->where('doctor_id', $doctor_id);
				})->get();
			return Datatables::of($users)
				->addColumn('action', function ($user) {
					$btn = '<a href="/admin/doctor/user/edit/'.$user->id.'" class="" title="Edit"><i class="fa fa-edit"></i></a>
					<a href="/admin/doctor/user/profile/'.$user->id.'" class="" title="Patient profile" target="_blank"><i class="fa fa-eye"></i></a>';
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
				})
				->make(true);
		}
		return view('admin.doctor.user.list');
	}
	public function add() {
		$doctor_id = Auth::user()->doctor_profile->id;
		$roles = Role::where('name','patient')->pluck('display_name','id')->toArray();
        return view('admin.doctor.user.add',compact('roles','doctor_id'));
	}
	public function store(Request $request) {
		$doctor_profile = Auth::user()->doctor_profile;
		$request_data = $request->all();
		$request->validate([
			'name'    => 'required|regex:/^[\pL\s]+$/u',
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

		// patient profile create
		PatientProfile::create([
			'user_id' => $user->id,
			'doctor_id' => $doctor_profile->id
		]);

        // user account creation email
		$data['subject'] = 'Patient Account Create';
        $data['name'] = $user['name'];
		$data['email'] = $user['email'];
		$data['password'] = $request_data['password'];
		$data['message'] = trans('sms.patient.user.create', ['doctor_name' => $doctor_profile['user']['name']]);
		$data['url'] = url('/clinic/'.$doctor_profile->slug); 
		$this->sendPatientUserCreateMail($data);

        return redirect()->route('admin.doctor.user')->with('success', 'User created Successfully !');
	}
	public function edit($id) {
		$user = User::where('id',$id)->first();
		if($user) {
			$roles = Role::pluck('name','id')->toArray();
			$old_role = [];
			if(!empty($user['roles'])) {
				$userRoles = $user['roles'];
				foreach($userRoles as $userRole) {
					$old_role[] = $userRole->id;
				}
				//$old_role = implode(",",$old_role);
			}
			return view('admin.doctor.user.edit',compact('user','roles','old_role'));
		} else {
			abort(404);
		}
	}
	public function update(Request $request) {
		$doctor_profile = Auth::user()->doctor_profile;
		$request_data = $request->all();
		$request->validate([
			'id' =>	'required',
			'name'    => 'required|regex:/^[\pL\s]+$/u',
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

            // user account password update email
			if($request_data['password']) {
				$data['subject'] = 'Patient Account Password Update';
				$data['name'] = $user['name'];
				$data['email'] = $user['email'];
				$data['password'] = $request_data['password'];
				$data['message'] = trans('sms.patient.user.update.password', ['doctor_name' => $doctor_profile['user']['name']]);
				$data['url'] = url('/clinic/'.$doctor_profile->slug);
				$this->sendPatientUserCreateMail($data);
			}
			return redirect()->route('admin.doctor.user')->with('success', 'User updated successfully !');
		} else {
			return redirect()->back()->with('error', 'Failer to updated user !');
		}
		
	}
	public function export(Request $request) {
		$query = User::with('doctor_profile')->whereHas('roles', function ($q) {
				$q->where('name', 'patient');
			})->get()->map(function ($user) {
				return [
					'id' => $user->id,
					'name' => $user->name,
					'email' => $user->email,
					'mobile' => $user->mobile,
					'status' => $user->status === 1 ? 'Active' : 'Deactive',
					'created_at' => $user->created_at,
				];
			});
		$heading = array("id","name","email","mobile","status","verified","patient_count","created_at");
		return $this->exportModule($model = null,$query,$heading);
	}
	public function profile($user_id) {
		$data = PatientProfile::where('user_id',$user_id)->first();
		return view('admin.doctor.user.profile',compact('data','user_id'));
	}
	public function profileSave(Request $request) {
		$request->validate([
			'gender' => 'required',
			'dob' => 'required|date|before_or_equal:' . now()->subYears(18)->toDateString(),
			'address' => 'required',
			'medical_history' => 'nullable',
		]);
		$doctor_id = Auth::user()->doctor_profile->id;

        $data = PatientProfile::updateOrCreate(
			[
				'user_id' => $request['user_id'],
				'doctor_id' => $doctor_id
			],
			[
				'gender' => $request['gender'],
				'dob' => $request['dob'],
				'address' => $request['address'],
				'medical_history' => $request['medical_history'],
			]
		);
		if($data) {
			return redirect()->route('admin.doctor.user')->with('success', 'Profile update successfully !');
		}
		return redirect()->back()->with('error', 'Failer to updated profile !');
	}
}
