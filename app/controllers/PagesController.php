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
		    $user = Sentry::findUserByLogin(Input::get('email'));

		    // Get the password reset code
		    $resetCode = $user->getResetPasswordCode();

				$data = [
					'activationLink' => 'http://frauccitywide.com/pages/resetpassword/'.$resetCode
				];

		    //send email
				Mail::send('emails.passwordreset', $data, function($message)
				{
					$message->from('contactus@frauc.com', 'FraucCityWide.com');
			  	$message->to(Input::get('email'), Input::get('email'))
			      ->subject('fraucCityWide - Password Reset');		
				});

				return Redirect::to('/home')
		    	->withMessage('We sent you an email.')
		    	->withMessage2('Click on the link in the email and we can get this ball rolling. If you have any issues please '.link_to('#contactModal', 'contact us!',['role' => 'button', 'data-toggle' => 'modal']))
		    	->with('messageType', 'bs-callout bs-callout-success');
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    $errorMessage = 'Email address was not found.';
		}

		if($errorMessage !== false){
			return Redirect::to('signup')
			->withMessage('The following errors occurred: '.$errorMessage)
			->with('messageType', 'bs-callout bs-callout-danger')->withInput();  
		}	
	}
}