<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\{User, DoctorProfile, PatientProfile};
use Carbon\Carbon;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	public function login(Request $request)
    {
		$this->validateLogin($request);
		if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();
            if($user && $user->hasRole('super-admin')) {
			    return $this->sendFailedLoginResponse($request);
            } else if($user->hasRole('patient')) {
                if($request->doctor_uuid) {
                    $doctor_uuid = $request->doctor_uuid;
                    $doctor = DoctorProfile::where('uuid', $request->doctor_uuid)->first();
                    $doctor_id = $doctor->id;
                    session(['doctor_id' => $doctor_id]);
                } else {
                    $doctor_id = PatientProfile::where('user_id', $user->id)->orderBy('created_at','desc')->limit(1)->value('doctor_id');
                    session(['doctor_id' => $doctor_id]);
                }
                User::where('id', $user->id)->update(['patient_doctor_id'=> $doctor_id, 'last_login'=> Carbon::now()]);
            }

            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
	protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|email',
            'password'        => 'required',
            'doctor_uuid'       => 'nullable|exists:doctor_profiles,uuid'
        ]);
		
    }
	protected function sendFailedLoginResponse(Request $request)
    {
        $user = $this->guard()->user();
		if($user && $user->hasRole('super-admin')) {	
            $this->guard()->logout();
            $request->session()->invalidate();
            $errors = ['authfailed' => trans('auth.authfailed')];
        } else {
			$errors = ['authfailed' => trans('auth.failed')];	
		}
		
		if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
        ->withErrors($errors);
    }
    protected function redirectTo()
    {
        $user = Auth::user();
        if ($user->hasRole('doctor')) {
            if($user->doctor_profile && $user->doctor_profile['is_verified']) {
                return '/clinic/'.$user->doctor_profile->slug;
            } else {
                return '/doctor/profile';
            }
        } elseif ($user->hasRole('patient')) {
            return '/patient/profile';
        }
        return '/login'; // Default fallback
    }
	public function logout() {
        $user = Auth::user();
        Session::flush();
		Auth::guard('web')->logout();
        $redirectTo = '/login';
        if($user->hasRole('doctor') && $user->doctor_profile && $user->doctor_profile['is_verified']) {
            $redirectTo = '/clinic/'.$user->doctor_profile->slug;
        } else if($user->hasRole('patient')) {
            $redirectTo = $user->patient_doctor_profile ? 'clinic/'.$user->patient_doctor_profile['slug'] :  '/login';
            $user->patient_doctor_id = null;
            $user->save();
        }
        return redirect($redirectTo);
    }
}
