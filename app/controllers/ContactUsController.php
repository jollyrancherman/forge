<?php

class ContactUsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * GET /contactus/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('contact_us.create');
	}

	/**
	 * Sends an email to contactus@frauc.com
	 * POST /contactus
	 *
	 * @return Response
	 */
	public function store()
	{
		$email = Input::get('email');
		$msg = Input::get('message');
		$name = Input::get('cname');

		$validator = Validator::make(
			['message' => Input::get('message'),'email' =>Input::get('email')],
			['message' => 'required', 'email' => "email|required"]
		);

		if($validator->fails()){
			$data = [
				'validator' => $validator->messages(),
				'failed' => true
			];

			return $data;
		}else{

			$data = [
				'email' => $email,
				'msg' => $msg,
				'name' => $name
			];

			Mail::send('emails.contactus', $data, function($message) use ($data)
			{
				$message->from($data['email'], $data['name']);
		  	$message->to('contactus@frauc.com', 'frauccitywide contact-us form')
		      ->subject('fraucCityWide-Contact_us_form');		
			});

			return 'OK';
		}
	}

}