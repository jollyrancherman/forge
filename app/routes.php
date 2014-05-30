<?php

//test for environment




Route::get('/', function(){
	return Redirect::to('comingsoon');
});

Route::get('/comingsoon', ['as' => 'comingsoon', 'uses' => 'ComingSoonController@create']);
Route::post('/comingsoon', ['as' => 'comingsoon.store', 'uses' => 'ComingSoonController@store']);

Route::get('/email', function()
{
	$data = [
		"name" => "Anthony",
		"address" => "anthony.rsc@gmail.com"
	];

	Mail::later(5,'emails.welcome', $data, function($message)
	{
  	$message->to('anthony.rsc@gmail.com', 'anthony.rsc@gmail.com')
      ->subject('We recieved your request at frauccitywide.com');		
	});
});