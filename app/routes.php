<?php

//test for environment

Route::get('/home', function(){
	return View::make('homepage.create');
});

Route::get('/comingsoon', ['as' => 'comingsoon', 'uses' => 'ComingSoonController@create']);
Route::post('/comingsoon', ['as' => 'comingsoon.store', 'uses' => 'ComingSoonController@store']);

Route::get('/email', function(){
	return View::make('emails.activation');
});

Route::get('/contactus', ['as' => 'contactus', 'uses' => 'ContactUsController@create']);
Route::post('/contactus', ['as' => 'contactus.store', 'uses' => 'ContactUsController@store']);

Route::get('/signup', ['as' => 'signup.create', 'uses' => 'RegistrationController@create']);
Route::post('/signup', ['as' => 'signup.store', 'uses' => 'RegistrationController@store']);

Route::get('/activation/{id}/{code}', function($id, $code){

	try
	{
	    // Find the user using the user id
	    $user = Sentry::findUserById($id);

	    // Attempt to activate the user
	    if ($user->attemptActivation($code))
	    {
	        echo 'yes!';
	    }
	    else
	    {
	        echo 'oh no!';
	    }
	}
	catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
	{
	    echo 'User was not found.';
	}
	catch (Cartalyst\Sentry\Users\UserAlreadyActivatedException $e)
	{
	    echo 'User is already activated.';
	}

});

Route::get('/', function(){
	return Redirect::to('comingsoon');
});