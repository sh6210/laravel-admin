<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller {

	public function __construct() {
		$this->middleware('auth')->only('index');
	}

	public function showLogin() {
		if ( \Auth::check() ) {
			return redirect( '/dashboard' );
		}

		return view( 'auth.showLogin' );
	}

	public function showRegistration() {
		if ( \Auth::check() ) {
			return redirect( '/dashboard' );
		}

		return view( 'auth.showRegistration' );
	}

	public function register( Request $request ) {

		$registrationData = $this->validate( $request, [
			'first_name' => 'nullable|max:50',
			'last_name'  => 'nullable|max:50',
			'username'   => 'nullable|max:50',
			'email'      => 'required|max:50',
			'password'   => 'required|min:6|confirmed',
		] );

		if ( $user = User::create( $registrationData ) ) {
			\Auth::login( $user );
		}

		return redirect( '/dashboard' );
	}

	public function index() {
		return view( 'auth.dashboard' );
	}

	public function logout() {
		\Auth::logout();

		return redirect( '/login' );
	}

	public function login( Request $request ) {

		$requestedData = $this->validate( $request, [
			'email'       => 'required|email',
			'password'    => 'required',
			'remember_me' => 'nullable|bool'
		] );

		$filteredData = array_except( $requestedData, 'remember_me' );

		if ( \Auth::attempt( $filteredData, $request->has('remember_me') ) ) {

			return redirect()->route('user.dashboard');
		}

		\Session::flash( 'Credential mismatch' );

		return back();
	}
}
