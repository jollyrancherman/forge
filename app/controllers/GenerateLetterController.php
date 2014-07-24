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

		$newGreeting = '';

		$rand = rand(1,3);

		$greeting = ['Hi', 'hi', 'Hello', 'hello', 'Hey', 'hey', 'How\'s it going', 'Howdy', 'Greetings', 'Hi there', 'Hello there', 'Hey there'];

		$punc = ['! '];

		$intro = [
			'I\'m ',
			'My name is ',
			'My name\'s '
		];

		$sent1 = [
			'I saw your post on Craigslist and ',
			'I know this is coming out of no where, ',
			'I wish someone told me about frauc earlier but '
		];

		$sent2 = [
			'have you tried frauc.com? ',
			'you might have better luck selling on frauc.com. ',
			'there is a new local site called frauc.com I think you might want to check out. ',
			'I\'ve had an easier time selling on frauc.com. ',
			'I have just gotta say frauc.com is awesome for selling things. ',
		];

		$sent4 = [
			'It really is an amazing site. ',
			'I feel more secure buying and selling there. ',
			'It has a lot of helpful features that classified sites dont offer. ',
			'Someone told me about it so I\'m spreading the love. ',
			'I feel its important to share new startups that are local. ',
		];

		$sent3 = [
			'It is free, local(northern NV) and you can auction items(also free). ',
			'You are able to rate and leave feedback on other buyers and sellers to make a better buying and selling community (Local Northern Nevada and free). ',
			'They is really worth checking out since your in northern Nevada. ',
			'They keep all your offers and messages in one spot so you do not have to dig through emails for information. ',
			'They have helped me make more money because their site makes buyers bid and compete against each other (Northern Nevada only). ',
			'You can leave your posts up until you get an offer you are happy with. '
		];

		$sent5 = [
			'Check it out if you have time, they have over 50,000 page views. ',
			'Doesn\'t hurt to look, right. ',
			'Scope them out on facebook, google, youtube if you\'re the research type (on KTVN http://www.ktvn.com/story/25992518/someone-2-know-frauccom. ',
			'Hit me back if you have questions, just supporting a local start-up. ',
			'If you like them, spread the love too! ',
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
			$punc[array_rand($punc)].
			$intro[array_rand($intro)].
			$username.'. '.
			$sent1[array_rand($sent1)].
			$sent2[array_rand($sent2)].
			$sent4[array_rand($sent4)].
			$sent3[array_rand($sent3)].
			$sent5[array_rand($sent5)].
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