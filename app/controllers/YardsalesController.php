<?php

class YardsalesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /yardsales
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function findByCity($city)
	{
		$yardsale = Yardsale::where('area', '=', $city)->get();

		echo $yardsale;

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /yardsales/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$userid = Sentry::getUser()->id;

		$yardsale = DB::table('Yardsales')->where('user_id', $userid)->first();

		Session::put('folder.id', $userid);
		return View::make('yardsale.create')->with('postID',$userid)->with('yardsale', $yardsale);		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /yardsales
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$error = false;
		$yardsale = '';

		$userid = Sentry::getUser()->id;

		// $yardsale = Yardsale::where('user_id', '=', $userid)->first();

		// dd($yardsale->first());

		if(!$yardsale){
			$yardsale = new Yardsale();
		}

		if($yardsale->validate($input)){
			$messageBag = new Illuminate\Support\MessageBag;

			if((Input::get('lat') == '' || Input::get('lng') == '')){
				$messageBag->add('address', 'Please select an address from the dropdown menu');
				$error = true;
				return Redirect::to('/dashboard/yardsale')->withMessage('The following errors occurred')->with('messageType', 'bs-callout bs-callout-danger')->withErrors($messageBag)->withInput();  
			}
			if(Input::get('area') == null){
				$messageBag->add('area', 'Please select an area.');
				$error = true;
			}
			if($error == true){
				return Redirect::to('/dashboard/yardsale')->withMessage('The following errors occurred')->with('messageType', 'bs-callout bs-callout-danger')->withErrors($messageBag)->withInput();  
			}
 
			$yardsale->area = Input::get('area');
			$yardsale->address = Input::get('address');
			$yardsale->title = Input::get('title');
			$yardsale->description = Input::get('description');
			$yardsale->lat = Input::get('lat');
			$yardsale->lng = Input::get('lng');
			$yardsale->user_id = Sentry::getUser()->id;
			$yardsale->folder_id = Sentry::getUser()->id;

			$yardsale->save();

			return Redirect::to('/dashboard/yardsale')
	    	->withMessage('You have successfully entered your yardsale information!')
	    	->withMessage2('If you have not paid your registration, please do so.')
	    	->with('messageType', 'bs-callout bs-callout-success');

		}else{
			$yardsale->errors()->add('address', 'Please select an address from the dropdown menu');

      return Redirect::to('/dashboard/yardsale')->withMessage('The following errors occurred')->with('messageType', 'bs-callout bs-callout-danger')->withErrors($yardsale->errors())->withInput();   			
		}
	}

	/**
	 * Display the specified resource.
	 * GET /yardsales/{id}
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
	 * GET /yardsales/{id}/edit
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
	 * PUT /yardsales/{id}
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
	 * DELETE /yardsales/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}