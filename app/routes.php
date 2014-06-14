<?php

Route::get('/email', function(){
	return View::make('emails.activation');
});

Route::get('/test',function() {
	echo $_ENV['BLUEIMP_DIR'];
	echo $_ENV['CURRENT_BASE_ADDRESS'];
});

Route::get('/contactus', ['as' => 'contactus', 'uses' => 'ContactUsController@create']);
Route::post('/contactus', ['as' => 'contactus.store', 'uses' => 'ContactUsController@store']);

Route::get('/yardsale/find/{city}', 'YardsalesController@findByCity');
Route::get('/yardsale/find/', 'YardsalesController@findByCity');
Route::get('/yardsale/{id}', 'YardsalesController@findById');


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
