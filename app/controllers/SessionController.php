<?php

class SessionController extends \BaseController {
	
	public function __construct() {
	    $this->beforeFilter('csrf', array('on'=>'post'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /session/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('signin.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /session
	 *
	 * @return Response
	 */
	public function store()
	{
		try
		{
	    // Login credentials
	    $credentials = [
        'email'    => Input::get('email'),
        'password' => Input::get('password')
	    ];

      $errorMessage = false;

	    // Authenticate the user
	    $user = Sentry::authenticate($credentials, false);
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    $errorMessage = 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    $errorMessage = 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    $errorMessage = 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    $errorMessage = 'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    $errorMessage = 'User is not activated.';
		}

		// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
		    $errorMessage = 'User is suspended.';
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    $errorMessage = 'User is banned.';
		}

		if($errorMessage !== false){
			return Redirect::to('signin')->withMessage('The following errors occurred: '.$errorMessage)->with('messageType', 'bs-callout bs-callout-danger')->withInput();  
		}else{
			return Redirect::to('dashboard');
		}		
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /session/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Sentry::logout();

		return Redirect::to('home')->withMessage('You have been logged out')->with('messageType', 'bs-callout bs-callout-info');
	}

}