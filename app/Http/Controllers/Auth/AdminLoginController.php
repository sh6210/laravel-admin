<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller {
	public function __construct() {
		$this->middleware( 'guest:admin' )->except('logout');
	}

	public function showLogin() {
		return view( 'admin.showLogin' );
	}

	public function login( Request $request ) {

		$validatedData = $this->validate( $request, [
			'email'       => 'required|email',
			'password'    => 'required|min:6',
			'remember_me' => 'nullable|bool'
		] );

		if ( \Auth::guard( 'admin' )
		          ->attempt( $validatedData, $request->has( 'remember_me' ) ) ) {

			return redirect()->intended(url('/admin'));

		}

		\Session::flash('error', 'Invalid credential');
		return redirect()->back()->withInput($request->only('email', 'remember_me'));
	}

	public function logout() {
//		Auth::guard('admin')->logout();
		\Auth::guard('admin')->logout();

		return redirect('/admin/login');
	}
}
