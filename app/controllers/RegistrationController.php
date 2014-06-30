<?php

class RegistrationController extends \BaseController {
	
	public function __construct() {
	    $this->beforeFilter('csrf', array('on'=>'post'));
	}
	
	/**
	 * Show the form for creating a new resource.
	 * GET /registration/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /registration
	 *
	 * @return Response
	 */
	public function store()
	{
    $validator = Validator::make(Input::all(), Registration::$rules);
    $errorMessage = false;
 
    if ($validator->passes()) {

			try
			{
			    // Let's register a user.
			    $user = Sentry::register(array(
			        'email'    => Input::get('email'),
			        'password' => Input::get('password'),
			    ));

			    // Let's get the activation code
			    $userId = $user->id;
			    $activationCode = $user->getActivationCode();

			    // Send activation code to the user so he can activate the account
			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
			    $errorMessage = 'Login field is required.';
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
			    $errorMessage = 'Password field is required.';
			}
			catch (Cartalyst\Sentry\Users\UserExistsException $e)
			{
			    $errorMessage = 'User with this login already exists.';
			}

		if($errorMessage !== false){
			return Redirect::to('signup')->withMessage('The following errors occurred: '.$errorMessage)->with('messageType', 'bs-callout bs-callout-danger')->withErrors($validator)->withInput();  
		}	
	 
			$data = [
				'activationLink' => 'http://frauccitywide.com/activation/'.$userId.'/'.$activationCode
			];

	    //send email
			Mail::send('emails.activation', $data, function($message)
			{
				$message->from('contactus@frauc.com', 'FraucCityWide.com');
		  	$message->to(Input::get('email'), Input::get('email'))
		      ->subject('Your activation email.');		
			});	    

	    //redirect user to homepage
	    return Redirect::to('/home')
	    	->withMessage('Thanks for registering!')
	    	->withMessage2('One more step...check your email to activate your account...you know the drill.')
	    	->with('messageType', 'bs-callout bs-callout-success');
    } else {
        // validation has failed, display error messages
        return Redirect::to('signup')->withMessage('The following errors occurred')->with('messageType', 'bs-callout bs-callout-danger')->withErrors($validator)->withInput();   
    }
	}

	public function activate($id, $code)
	{
		$errorMessage = false;

		try
		{
		    // Find the user using the user id
		    $user = Sentry::findUserById($id);

		    // Attempt to activate the user
		    if ($user->attemptActivation($code))
		    {
		    		Sentry::login($user, true);
		        return Redirect::to('dashboard')->withMessage('Your account has been activated and you are currently logged in! Try '.link_to('/dashboard/yardsale', 'updating your yard sale information.'))->with('messageType', 'bs-callout bs-callout-success');
		    }
		    else
		    {
		        $errorMessage = 'an error occurred, please contact us if the problem persists.';
		    }
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    $errorMessage = 'that user was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserAlreadyActivatedException $e)
		{
		    $errorMessage = 'that user is already activated, try '.link_to('/signin', 'signing in.');
		}

		if($errorMessage !== false){
			return Redirect::to('home')->withMessage('Don\'t shoot the messanger but '.$errorMessage)->with('messageType', 'bs-callout bs-callout-danger');  
		}	
	}

}