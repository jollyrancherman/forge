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
		$visible = Yardsale::where('user_id', '=', Sentry::getUser()->id)->firstOrFail();

		return View::make('dashboard.index')->with('visible', $visible);
	}
}