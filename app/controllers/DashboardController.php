<?php

class DashboardController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /dashboard
	 *
	 * @return Response
	 */
	public function index()
	{
		$record = Yardsale::where('user_id', Sentry::getUser()->id)->first();

		if($record == NULL){
			$data = [
				'active' => 0,
				'yardsale' => ''
			];
		}else{	
			$data = [
				'active' => $record->active,
				'yardsale' => $record->lat
			];
		}

		return View::make('dashboard.index')->with('data', $data);
	}
}