<?php

//test for environment



Route::get('/email', function(){
	return View::make('emails.activation');
});

Route::get('/test',function() {

	dd($actual_link = "http://$_SERVER[HTTP_HOST]/garageSale/");
	return View::make('test');
});

Route::get('/contactus', ['as' => 'contactus', 'uses' => 'ContactUsController@create']);
Route::post('/contactus', ['as' => 'contactus.store', 'uses' => 'ContactUsController@store']);


/*=================================
=            LOGGED IN            =
=================================*/
Route::group(['before' => 'auth'], function()
{
    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

    Route::get('/dashboard/yardsale', 'YardsaleController@create');
    Route::post('/dashboard/yardsale', 'YardsaleController@store');

		Route::get('/logout', ['as' => 'logout', 'uses' => 'SessionController@destroy']);


		/*================================
		=            Yardsale            =
		================================*/
		Route::get('/yardsale/create', 'YardsalesController@create');
		Route::post('/yardsale/create', 'YardsalesController@store');
});


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







/*===================================
=            COMING SOON            =
===================================*/
Route::get('/comingsoon', ['as' => 'comingsoon', 'uses' => 'ComingSoonController@create']);
Route::post('/comingsoon', ['as' => 'comingsoon.store', 'uses' => 'ComingSoonController@store']);

Route::get('/', function(){
	return Redirect::to('comingsoon');
});
