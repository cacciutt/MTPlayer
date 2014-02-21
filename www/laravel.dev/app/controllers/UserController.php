<?php

class UserController extends BaseController {

	public function index()
	{

		return View::make('user.index')->with("title", "Project Login")
										   ->with("projectname", "MultiTrackPlayer");
	}


	// Authentication function
	public function login() {

		// Get the input variables
		$username = Input::get('username');
		$password = Input::get('password');

		// Optionally:
		// $remember = (bool) Input::get('remember', false);

		// Define the credentials array
		$credentials = array(
			'username' => $username,
			'password' => $password,
		);

		// Attempt the login
		if ( Auth::attempt($credentials))
		{
			// Success
			return Redirect::to('track')->with('message', 'You are now logged in!');
		}
		else
		{
			// Failed
			return Redirect::to('user/login')
		      ->with('message', 'Your username/password combination was incorrect')
		      ->withInput();
		}
	}

	// New user creation
	public function new_user() {
	    $username = Input::get('username');
	    $password = Input::get('password');

	    $user = new User();
	    $user->email = $email;
	    $user->password = Hash::make($password);
	    $user->first_name =$first_name;
	    $user->last_name= $last_name;
	    $user->username= $username;
	    try{

	        $user->save();
	    }
	    catch(Exception $e) {
	        echo "Failed to create new user!";
	    }
	}


}