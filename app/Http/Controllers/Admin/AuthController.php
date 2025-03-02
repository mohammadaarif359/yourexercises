<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
	protected $redirectTo = '/admin/category';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	public function showLoginForm() {
		return view('admin.auth.login');
	}
	public function login(Request $request)
    {
		$this->validateLogin($request);
		if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();
            if($user && $user->hasRole('patient')) {
			    return $this->sendFailedLoginResponse($request);
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
        ]);
		
    }
	protected function sendFailedLoginResponse(Request $request)
    {
        $user = $this->guard()->user();
		if($user && $user->hasRole('patient')) {	
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
	public function logout() {
		Session::flush();
		Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
