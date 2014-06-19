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
		$active = Yardsale::where('user_id', Sentry::getUser()->id)->first();

		return View::make('dashboard.index')->with('active', $active);
	}
}