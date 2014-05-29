<?php

class ComingSoonController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * GET /comingsoon/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = '';

		return View::make('comingsoon.create')->withData($data);	
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /comingsoon
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

}