<?php

class YardsalesController extends \BaseController {

	public function findById($id = '')
	{
		//find yardsale by id
		$yardsale = Yardsale::where('id','=',$id)->first();

		//image folder path for yard sale.
		$path = public_path()."/garageSale/$yardsale->user_id";

		//Grab all images
		$images = glob("$path/*.{jpg,JPG,jpeg,JPEG,gif,GIF,png,PNG}",GLOB_BRACE);

		return View::make('yardsale.findById')->with('data', $yardsale)->with('images', $images);

	}

	public function findByCity($city = '')
	{
		$yardsale = Yardsale::where('area', '=', $city)->get();

		return View::make('yardsale.find')->with('data', $yardsale);
	}

	public function create()
	{
		$userid = Sentry::getUser()->id;



		$yardsale = DB::table('Yardsales')->where('user_id', $userid)->first();

		if($yardsale == NULL){
			$yardsale = new Yardsale();
			$yardsale->user_id = $userid;
			$yardsale->save();
		}

		Session::put('folder.id', $userid);
		return View::make('yardsale.create')->with('postID',$userid)->with('yardsale', $yardsale);		
	}

	public function store()
	{
		$input = Input::all();
		$error = false;
		$yardsale = '';

		$userid = Sentry::getUser()->id;

		$yardsale = Yardsale::where('user_id', '=', $userid)->first();

		// dd($yardsale->first());

		if($yardsale == null){
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

}