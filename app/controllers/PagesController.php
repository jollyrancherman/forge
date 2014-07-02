<?php

class PagesController extends \BaseController {


	public function tos()
	{
		return View::make('pages.tos');
	}

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
					'activationLink' => 'http://frauccitywide.com/resetpassword/'.$resetCode
				];

		    //send email
				Mail::send('emails.passwordreset', $data, function($message)
				{
					$message->from('contactus@frauc.com', 'FraucCityWide.com');
			  	$message->to(Input::get('email'), Input::get('email'))
			      ->subject('FraucCityWide - Password Reset');		
				});

				return Redirect::to('/home')
		    	->withMessage('We sent you an email.')
		    	->withMessage2('Click on the link in the email and we can get this ball rolling. If you have any issues please '.link_to('#contactModal', 'contact us!',['role' => 'button', 'data-toggle' => 'modal']))
		    	->with('messageType', 'bs-callout bs-callout-success');
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    $errorMessage = 'that email address was not found.';
		}

		if($errorMessage !== false){
			return Redirect::to('passwordreset')
			->withMessage('Hmmmm....'.$errorMessage)
			->with('messageType', 'bs-callout bs-callout-danger')->withInput();  
		}	
	}

	public function resetPassword()
	{
		return View::make('pages.resetpassword');
	}

	public function resetPasswordPost($resetcode)
	{
		try
		{
		    // Find the user using the user id
		    $user = Sentry::findUserByResetPasswordCode($resetcode);

		    // Check if the reset password code is valid
		    if ($user->checkResetPasswordCode($resetcode))
		    {
		        // Attempt to reset the user password
		        if ($user->attemptResetPassword($resetcode, Input::get('password')))
		        {
							return Redirect::to('signin')
								->withMessage('Success! Try out your new password!')
								->with('messageType', 'bs-callout bs-callout-success');  
		        }
		        else
		        {
							return Redirect::to('passwordreset')
								->withMessage('Hmmmm....something went wrong. Try again or contact us.')
								->with('messageType', 'bs-callout bs-callout-danger')->withInput();  
		        }
		    }
		    else
		    {
					return Redirect::to('passwordreset')
						->withMessage('Hmmmm....try a different password. Maybe one between 6-30 alphanumeric characters?')
						->with('messageType', 'bs-callout bs-callout-danger')->withInput();  
		    }
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
				return Redirect::to('passwordreset')
				->withMessage('Hmmmm....no records were found.')
				->with('messageType', 'bs-callout bs-callout-danger')->withInput();  
		}		
	}

}