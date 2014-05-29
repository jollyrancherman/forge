<?php

//test for environment




Route::get('/', function(){
	return Redirect::to('comingsoon');
});

Route::get('/comingsoon', ['as' => 'comingsoon', 'uses' => 'ComingSoonController@create']);
Route::post('/comingsoon', ['as' => 'comingsoon.store', 'uses' => 'ComingSoonController@store']);