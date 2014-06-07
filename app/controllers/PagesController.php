<?php

class PagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /pages
	 *
	 * @return Response
	 */
	public function passwordReset()
	{
		return View::make('pages.passwordreset');
	}


	public function passwordResetPost()
	{
		$errorMessage = false;

		try
		{
		    // Find the user using the user email address
		    $user = Sentry::findUserByLogin('john.doe@example.com');

		    // Get the password reset code
		    $resetCode = $user->getResetPasswordCode();

		    // Now you can send this code to your user via email for example.
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    $errorMessage = 'User was not found.';
		}		
	}
}