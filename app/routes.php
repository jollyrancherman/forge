<?php

App::bind('Acme\Billing\BillingInterface', 'Acme\Billing\StripeBilling');

Route::get('/email', function(){
	return View::make('emails.activation');
});

Route::get('/test',function() {
	echo $_ENV['BLUEIMP_DIR'];
	echo $_ENV['CURRENT_BASE_ADDRESS'];
});

/*==================================
=            Contact Us            =
==================================*/
Route::get('/contactus', ['as' => 'contactus', 'uses' => 'ContactUsController@create']);
Route::post('/contactus', ['as' => 'contactus.store', 'uses' => 'ContactUsController@store']);


/*================================
=            Yardsale            =
================================*/
Route::get('/yardsale/find/{city}/listview', 'YardsalesController@listView');
Route::get('/yardsale/find/{city}', 'YardsalesController@findByCity');
Route::get('/yardsale/find/', 'YardsalesController@findByCity');
Route::get('/yardsale/{id}', 'YardsalesController@findById');

/*===================================
=            COMING SOON            =
===================================*/
Route::get('/comingsoon', ['as' => 'comingsoon', 'uses' => 'ComingSoonController@create']);
Route::post('/comingsoon', ['as' => 'comingsoon.store', 'uses' => 'ComingSoonController@store']);

Route::get('/', function(){
	return Redirect::to('comingsoon');
});


/*========================================
=            Pages Controller            =
========================================*/
Route::get('/tos', ['as' => 'tos', 'uses' => 'PagesController@tos']);


/*=================================
=            LOGGED IN            =
=================================*/
Route::group(['before' => 'auth'], function()
{
    Route::get('/dashboard', ['as' => 'dash', 'uses' => 'DashboardController@index']);

		Route::get('/logout', ['as' => 'logout', 'uses' => 'SessionController@destroy']);

    Route::get('/dashboard/yardsale', 'YardsalesController@create');
    Route::post('/dashboard/yardsale', 'YardsalesController@store');

    Route::post('/blueimp', 'ImageController@index');
    Route::get('/blueimp', 'ImageController@index');
    Route::delete('/blueimp', 'ImageController@index');

    Route::get('/payment', 'PaymentController@create');

});
    Route::post('/payment', function()
		{
	    $billing = App::make('Acme\Billing\BillingInterface');

	    try {
		    $results = $billing->charge([
		    	'email' => Sentry::getUser()->email,
		    	'token' => Input::get('stripe-token'),
		    ]);

		    //check if success
		    if ($results->paid) {
			    
			    //send email
			    
			    //redirect with message
			    return Redirect::refresh()->withMessage('You were successfully billed $12. A receipt will be sent to you.')->with('messageType', 'bs-callout bs-callout-success');  
			    
		    }else{
		    	return Redirect::refresh()->withInput()->withMessage('An error occurred. Your account was not billed. Please contact us if you continue to receive this error.')->with('messageType', 'bs-callout bs-callout-danger');  
		    }
	    	
	    } catch (Exception $e) {
	    	//redirect with message
	    	return Redirect::refresh()->withInput()->withMessage($e->getMessage())->with('messageType', 'bs-callout bs-callout-danger');  
	    }

		});



/*==================================
=            Guest Only            =
==================================*/




Route::group(['before' => 'guest'], function()
{
	Route::get('/home', function(){
		return View::make('homepage.create');
	});
	
	/*====================================
	=            REGISTRATION            =
	====================================*/
	Route::get('/signup', ['as' => 'signup.create', 'uses' => 'RegistrationController@create']);
	Route::post('/signup', ['as' => 'signup.store', 'uses' => 'RegistrationController@store']);

	Route::get('/activation/{id}/{code}', 'RegistrationController@activate');

 	/*================================
	=            SESSIONS            =
	================================*/
	Route::get('/signin', ['as' => 'signin', 'uses' => 'SessionController@create']);
	Route::post('/signin', ['as' => 'signin.store', 'uses' => 'SessionController@store']);

	/*========================================
	=            Pages Controller            =
	========================================*/
	Route::get('/passwordreset', ['as' => 'passwordreset', 'uses' => 'PagesController@passwordReset']);
	Route::post('/passwordreset', ['as' => 'passwordreset', 'uses' => 'PagesController@passwordResetPost']);

	Route::get('/resetpassword/{resetcode}', 'PagesController@resetPassword');
	Route::post('/resetpassword/{resetcode}', 'PagesController@resetPasswordPost');

});





