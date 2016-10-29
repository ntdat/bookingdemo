<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\UserResquest;
use Illuminate\Support\Facades\Request;
use Sentinel;




class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{

		Sentinel::disableCheckpoints();
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);

	}
	public function getlogin()
	{
		return view('auth.login');
	}
	public function postlogin()
	{

		$data = array(
			'login'	=>Request::input('txtEmail'),
			'password'	=>Request::input('txtPassword')
		);
		if( Sentinel::authenticate($data)){
			return redirect()->route('admin.user.getlist');
		}else{
			return redirect()->back();
		}



	}
	public function getlogout()
	{
		Sentinel::logout();
		return redirect()->route('auth.getlogin');
	}
}
