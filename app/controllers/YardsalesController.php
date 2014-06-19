<?php

class YardsalesController extends \BaseController {

	public function completePayment()
	{
    $billing = App::make('Acme\Billing\BillingInterface');

    try {
	    $results = $billing->charge([
	    	'email' => Sentry::getUser()->email,
	    	'token' => Input::get('stripe-token'),
	    ]);

	    //check if success
	    if ($results->paid) {
		    
		    $data = [];

		    $email = Sentry::getUser()->email;
		    $id = Sentry::getUser()->id;
		    
		    //send email
				Mail::send('emails.paid', $data, function($message) use ($email)
				{
					$message->from('contactus@frauc.com', 'FraucCityWide.com');
			  	$message->to($email, $email)
			      ->subject('Payment Recieved.');		
				});	  

				$yardsale = Yardsale::where('user_id' , $id)->first();
				$yardsale->active = '1';
				$yardsale->save();

		    //redirect with message
		    return Redirect::to('/dashboard')->withMessage('You were successfully billed $12. A receipt will be sent to you.')->with('messageType', 'bs-callout bs-callout-success');  
		    
	    }else{
	    	return Redirect::refresh()->withInput()->withMessage('An error occurred. Your account was not billed. Please contact us if you continue to receive this error.')->with('messageType', 'bs-callout bs-callout-danger');  
	    }
    	
    } catch (Exception $e) {
    	//redirect with message
    	return Redirect::refresh()->withInput()->withMessage($e->getMessage())->with('messageType', 'bs-callout bs-callout-danger');  
    }
	}

	public function listView($city = '')
	{
		$yardsale = Yardsale::where('area', '=', $city)->get();

		return View::make('yardsale.listview')->with('data', $yardsale);
	}

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

		return View::make('yardsale.find')->with('data', $yardsale)->with('city', $city);
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