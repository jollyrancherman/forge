<?php

class ComingSoonController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * GET /comingsoon/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$getCount = ComingSoon::all()->lists('city');

		$numbers = array_count_values($getCount);
		return View::make('comingsoon.create')->withNumbers($numbers);	
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /comingsoon
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(
			['city' => Input::get('city'),'email' => Input::get('email')],
			['city' => 'required', 'email' => "email|required|unique:subscription"]
		);

		if($validator->fails()){
			return $validator->messages();
		}else{

			$newEmail = new ComingSoon();

			$newEmail->email = Input::get('email');
			$newEmail->city = Input::get('city');

			$newEmail->save();

			$data = [];

			Mail::send('emails.welcome', $data, function($message)
			{
				$message->from('info@frauc.com', 'FraucCityWide.com');
		  	$message->to(Input::get('email'), Input::get('email'))
		      ->subject('A top-secret message from FraucCityWide');		
			});

			return 'OK';
		}
	}

}