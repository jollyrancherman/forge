<?php

class GenerateLetterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /generateletter
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('letterGen.create');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /generateletter/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return 'ok';

		$newGreeting = '';

		$rand = rand(1,3);

		$greeting = ['Hi', 'hi', 'Hello', 'hello', 'Hey', 'hey', 'How\'s it going', 'Howdy', 'Greetings', 'Hi there', 'Hello there', 'Hey there'];

		$punc = ['. ', '! '];

		$intro = [
			'I\'m ',
			'My name is ',
			'My friends call me '
		];

		$sent1 = [
			'Not to bug you but ',
			'I saw your post on Craigslist and ',
			'This is out of no where, ',
			'I wish someone told me earlier but '
		];

		$sent2 = [
			'have you tried frauc.com? ',
			'you might have better luck selling on frauc.com. ',
			'there is a new local site called frauc.com I think people should check out. ',
			'i\'ve had had an easier time selling on frauc.com. ',
			'frauc.com is awesome. ',
		];

		$sent3 = [
			'It is free, local and you can auction. ',
			'You are able to rate and leave feedback on other buyers and sellers to make a better buying and selling community. ',
			'It is really worth checking out. ',
			'It keeps all your offers and messages in spot so you do not have to dig through emails for information. ',
			'It has helped me make more money because it makes a price war with the buyers. ',
			'You can leave your posts up until you get an offer you are happy with. '
		];

		$closure = [
			'Good luck, ',
			'Thanks, ',
			'Sincerely, ',
			'Take care, ',
			'Sincerely, ',
			'Respectfully, ',
			'Peace, ',
			'Kind regards, ',
			'Take it easy, ',
			'Have a nice day, ',
			'Peace, love and pogo sticks, ',
			'Later Vader, ',
			'Take Care, Comb your hair, ',
			'May the gods guard your well being, ',
			'May the gods not smite you, ',
			'Confusion to your enemies, ',
			'Anything you can do I can do better, ',
			'From the mind of a genius, ',
			'Lock and Load, ',
			'You don\'t need to see my credentials, ',
			'My time is up and I thank you for yours, ',
			'Go and make disciples, ',
			'Later tater, ',
			'Unquestioningly,'

		];

		$name = [
		'Sammy',
		'Taylor',
		'Tessa',
		'Patty',
		'John',
		'Jen',
		'Sarah',
		'Julie',
		'Lesley',
		'Heather',
		'TJ',
		'Amber',
		'Savannah'
		];

		$username = $name[array_rand($name)];

		$newGreeting = 
			$greeting[array_rand($greeting)].
			// str_repeat($punc[array_rand($punc), $rand)].
			$intro[array_rand($intro)].
			$username.'. '.
			$sent1[array_rand($sent1)].
			$sent2[array_rand($sent2)].
			$sent3[array_rand($sent3)].
			$closure[array_rand($closure)].
			$username;

		return $newGreeting;
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /generateletter
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /generateletter/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /generateletter/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /generateletter/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /generateletter/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}