<?php

//test for environment




Route::get('/', function(){
	Redirect::to('/comingSoon');
});

Route::get('/comingsoon', ['as' => 'comingSoon', 'uses' => 'ComingSoonController@create']);
Route::post('/comingsoon', ['as' => 'comingSoon.store', 'uses' => 'ComingSoonController@store']);