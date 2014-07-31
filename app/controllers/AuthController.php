<?php

class AuthController extends BaseController
{

	public function getLogin()
	{
		return View::make('auth.login');
	}

	public function postLogin()
	{
		$credentials = [
		'username' => Input::get('username'),
		'password' => Input::get('password')
		];

		if(Auth::attempt($credentials)){
			return Redirect::intended();
		}else{
			return Redirect::route('app.auth.login')
			               ->with('error','Invalid username or password');
		}
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::route('app.auth.login')
									->with('success', 'You are now logged out.');
	}

	public function getForgotPassword()
	{

	}

	public function postForgotPassword()
	{

	}
}