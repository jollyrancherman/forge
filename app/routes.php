<?php

//test for environment

Route::get('/home', function(){
	return View::make('homepage.create');
});


Route::get('/email', function(){
	return View::make('emails.activation');
});

Route::get('/contactus', ['as' => 'contactus', 'uses' => 'ContactUsController@create']);
Route::post('/contactus', ['as' => 'contactus.store', 'uses' => 'ContactUsController@store']);


/*=================================
=            LOGGED IN            =
=================================*/
Route::group(['before' => 'auth'], function()
{
    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/dashboard/yardsale', 'YardsaleController@create');
    Route::post('/dashboard/yardsale', 'YardsaleController@store');
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
Route::get('/logout', ['as' => 'logout', 'uses' => 'SessionController@destroy']);




/*===================================
=            COMING SOON            =
===================================*/
Route::get('/comingsoon', ['as' => 'comingsoon', 'uses' => 'ComingSoonController@create']);
Route::post('/comingsoon', ['as' => 'comingsoon.store', 'uses' => 'ComingSoonController@store']);

Route::get('/', function(){
	return Redirect::to('comingsoon');
});