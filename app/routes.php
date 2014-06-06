<?php

//test for environment




Route::get('/', function(){
	return Redirect::to('comingsoon');
});

Route::get('/home', function(){
	return View::make('homepage.create');
});

Route::get('/comingsoon', ['as' => 'comingsoon', 'uses' => 'ComingSoonController@create']);
Route::post('/comingsoon', ['as' => 'comingsoon.store', 'uses' => 'ComingSoonController@store']);

Route::get('/email', function(){
	return View::make('emails.welcome');
});

Route::get('/contactus', ['as' => 'contactus', 'uses' => 'ContactUsController@create']);
Route::post('/contactus', ['as' => 'contactus.store', 'uses' => 'ContactUsController@store']);

Route::get('/signup', ['as' => 'signup', 'uses' => 'UserController@create']);