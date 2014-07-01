<?php

App::bind('Acme\Billing\BillingInterface', 'Acme\Billing\StripeBilling');

Route::get('/email', function(){
	return View::make('emails.paid');
});

Route::get('/test',function() {
	$total = array_count_values(Yardsale::all()->lists('area'));
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
	return Redirect::to('/home');
});


/*========================================
=            Pages Controller            =
========================================*/
Route::get('/tos', ['as' => 'tos', 'uses' => 'PagesController@tos']);

/*=================================
=            Home Page            =
=================================*/

Route::get('/home', function(){
	// $total = array_count_values(Yardsale::all()->lists('area'));
	$total = array_count_values(DB::table('Yardsales')->where('active','1')->lists('area'));

	// dd(array_key_exists('carson', $total));
	$data = [
		'carson' => 68 - (array_key_exists('carson', $total)? $total['carson'] : 0),
		'douglas' => 65 - (array_key_exists('douglas', $total)? $total['douglas'] : 0),
		'sparks' => 72 - (array_key_exists('sparks', $total)? $total['sparks'] : 0),
		'reno' => 75 - (array_key_exists('reno', $total)? $total['reno'] : 0)
	];

	return View::make('homepage.create')->with('data', $data);
});

/*=================================
=            LOGGED IN            =
=================================*/
Route::group(['before' => 'auth'], function()
{
	if(Sentry::getUser())
	{

		$record = Yardsale::where('user_id', Sentry::getUser()->id)->first();

		if($record == NULL){
			Session::put('yardsale.active', false);
			Session::put('yardsale.created', false);
		}else{	
			Session::put('yardsale.active', $record->active);
			Session::put('yardsale.id', $record->id);
			$record->lat > 0 ? Session::put('yardsale.created', true) : Session::put('yardsale.created', false);
		}


	}



  Route::get('/dashboard', ['as' => 'dash', 'uses' => 'DashboardController@index']);

	Route::get('/logout', ['as' => 'logout', 'uses' => 'SessionController@destroy']);

  Route::get('/dashboard/yardsale', 'YardsalesController@create');
  Route::post('/dashboard/yardsale', 'YardsalesController@store');

  Route::post('/blueimp', 'ImageController@index');
  Route::get('/blueimp', 'ImageController@index');
  Route::delete('/blueimp', 'ImageController@index');

  Route::get('/payment', 'PaymentController@create');
  Route::post('/payment', 'YardsalesController@completePayment');

});



/*==================================
=            Guest Only            =
==================================*/
Route::group(['before' => 'guest'], function()
{

	
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


/*=====================================
=            AJAX Requests            =
=====================================*/
//Change Active
Route::post('/yardsale/hide', 'YardsalesController@ToggleHide');





