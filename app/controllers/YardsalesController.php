<?php



class YardsalesController extends \BaseController {


	public function toggleHide()
	{
   	if(Input::get('visible') === '1' || Input::get('visible') == '0'){
	    Yardsale::where('user_id','=',Sentry::getUser()->id)->update(['visible' => Input::get('visible')]);
	    $visible = Yardsale::where('user_id', '=', Sentry::getUser()->id)->firstOrFail();
	    return $visible->visible;

   	}else{
   		return false;
   	}
	}


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
			      ->subject('FraucCityWide payment received.');		
				});	  

				// $yardsale = Yardsale::where('user_id' , $id)->first();
				// $yardsale->active = '1';
				// $yardsale->save();

				$yardsale = Yardsale::firstOrNew(array('user_id' => $id));
				$yardsale->user_id = $id;
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
		$yardsale = Yardsale::where('area', '=', $city)
													->where('visible', '=', '1')
													->get();

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
		$yardsale = Yardsale::where('area', '=', $city)
													->where('visible', '=', '1')
													->get();

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

		$total = array_count_values(DB::table('Yardsales')->where('active','1')->lists('area'));

		// dd(array_key_exists('carson', $total));
		$data = [
			'carson' => 68 - (array_key_exists('carson', $total)? $total['carson'] : 0),
			'douglas' => 66 - (array_key_exists('douglas', $total)? $total['douglas'] : 0),
			'sparks' => 72 - (array_key_exists('sparks', $total)? $total['sparks'] : 0),
			'reno' => 75 - (array_key_exists('reno', $total)? $total['reno'] : 0)
		];		

		$dataArray = ['' => 'Please select a city'];

		if($data['douglas'] > 0){
			$dataArray['douglas'] = 'Minden/Gardnerville - July 26th ('.$data['douglas'].' spots available)';
		}
		if($data['carson'] > 0){
			$dataArray['carson'] = 'Carson City - August 16th ('.$data['carson'].' spots available)';
		}
		if($data['reno'] > 0){
			$dataArray['reno'] = 'Reno - August 9th ('.$data['reno'].' spots available)';
		}
		if($data['sparks'] > 0){
			$dataArray['sparks'] = 'Sparks - July 26th ('.$data['sparks'].' spots available)';
		}

		Session::put('folder.id', $userid);
		return View::make('yardsale.create')->with('postID',$userid)->with('yardsale', $yardsale)->with('dataArray',$dataArray);		
	}

	public function createNew()
	{
		$userid = Sentry::getUser()->id;

		//create a unique ID from the current timestamp.
		if(!Session::has('UniqueIDForFolder')){
			$timestamp = \Carbon\Carbon::now()->timestamp;
			Session::set('UniqueIDForFolder', $timestamp);
		}

		$total = array_count_values(DB::table('Yardsales')->where('active','1')->lists('area'));

		$data = [
			'carson' => 68 - (array_key_exists('carson', $total)? $total['carson'] : 0),
			'douglas' => 66 - (array_key_exists('douglas', $total)? $total['douglas'] : 0),
			'sparks' => 72 - (array_key_exists('sparks', $total)? $total['sparks'] : 0),
			'reno' => 75 - (array_key_exists('reno', $total)? $total['reno'] : 0)
		];		

		$dataArray = ['' => 'Please select a city'];

		if($data['douglas'] > 0){
			$dataArray['douglas'] = 'Minden/Gardnerville - July 26th ('.$data['douglas'].' spots available)';
		}
		if($data['carson'] > 0){
			$dataArray['carson'] = 'Carson City - August 16th ('.$data['carson'].' spots available)';
		}
		if($data['reno'] > 0){
			$dataArray['reno'] = 'Reno - August 9th ('.$data['reno'].' spots available)';
		}
		if($data['sparks'] > 0){
			$dataArray['sparks'] = 'Sparks - July 26th ('.$data['sparks'].' spots available)';
		}

		return View::make('adminAdd.create')->with('dataArray',$dataArray);			
	}

	public function store()
	{
		$input = Input::all();
		$error = false;
		$yardsale = '';

		$userid = Sentry::getUser()->id;

		$yardsale = Yardsale::where('user_id', '=', $userid)->first();

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
			$yardsale->address = strip_tags(Input::get('address'));
			$yardsale->title = strip_tags(Input::get('title'));
			$yardsale->description = strip_tags(Input::get('description'));
			$yardsale->lat = Input::get('lat');
			$yardsale->lng = Input::get('lng');
			$yardsale->visible = 1;
			$yardsale->user_id = Sentry::getUser()->id;
			$yardsale->folder_id = Sentry::getUser()->id;

			$yardsale->save();

			if($yardsale->active == 1){
				return Redirect::to('/dashboard')
		    	->withMessage('You have successfully entered your yardsale information!')
		    	->withMessage2('Don\'t forget to donate to Big Brothers Big Sisters! (only if you want to)')
		    	->with('messageType', 'bs-callout bs-callout-success');	
			}else{
				return Redirect::to('/payment')
		    	->withMessage('You have successfully entered your yardsale information!')
		    	->withMessage2('Don\'t forget to donate to Big Brothers Big Sisters! (only if you want to)')
		    	->with('messageType', 'bs-callout bs-callout-success');					
			}


		}else{
			$yardsale->errors()->add('address', 'Please select an address from the dropdown menu');

      return Redirect::to('/dashboard/yardsale')->withMessage('The following errors occurred')->with('messageType', 'bs-callout bs-callout-danger')->withErrors($yardsale->errors())->withInput();   			
		}
	}


	public function storeNew()
	{
		$input = Input::all();
		$error = false;
		$yardsale = '';

		$userid = Session::get('UniqueIDForFolder');

		$yardsale = Yardsale::where('user_id', '=', $userid)->first();

		if($yardsale == null){
			$yardsale = new Yardsale();
		}

		if($yardsale->validate($input)){
			$messageBag = new Illuminate\Support\MessageBag;

			if((Input::get('lat') == '' || Input::get('lng') == '')){
				$messageBag->add('address', 'Please select an address from the dropdown menu');
				$error = true;
				return Redirect::to('/addSales')->withMessage('The following errors occurred')->with('messageType', 'bs-callout bs-callout-danger')->withErrors($messageBag)->withInput();  
			}
			if(Input::get('area') == null){
				$messageBag->add('area', 'Please select an area.');
				$error = true;
			}
			if($error == true){
				return Redirect::to('/addSales')->withMessage('The following errors occurred')->with('messageType', 'bs-callout bs-callout-danger')->withErrors($messageBag)->withInput();  
			}
 
			$yardsale->area = Input::get('area');
			$yardsale->address = strip_tags(Input::get('address'));
			$yardsale->title = strip_tags(Input::get('title'));
			$yardsale->description = strip_tags(Input::get('description'));
			$yardsale->lat = Input::get('lat');
			$yardsale->lng = Input::get('lng');
			$yardsale->visible = 1;
			$yardsale->user_id = $userid;
			$yardsale->folder_id = $userid;

			$yardsale->save();

			Session::forget('UniqueIDForFolder');

			if($yardsale->active == 1){
				return Redirect::to('/dashboard')
		    	->withMessage('You have successfully entered your yardsale information!')
		    	->withMessage2('Don\'t forget to donate to Big Brothers Big Sisters! (only if you want to)')
		    	->with('messageType', 'bs-callout bs-callout-success');	
			}else{
				return Redirect::to('/payment')
		    	->withMessage('You have successfully entered your yardsale information!')
		    	->withMessage2('Don\'t forget to donate to Big Brothers Big Sisters! (only if you want to)')
		    	->with('messageType', 'bs-callout bs-callout-success');					
			}


		}else{
			$yardsale->errors()->add('address', 'Please select an address from the dropdown menu');

      return Redirect::to('/dashboard/yardsale')->withMessage('The following errors occurred')->with('messageType', 'bs-callout bs-callout-danger')->withErrors($yardsale->errors())->withInput();   			
		}
	}	

}