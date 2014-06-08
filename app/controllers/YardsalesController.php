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

	/**
	 * Show the form for creating a new resource.
	 * GET /yardsales/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$userid = Sentry::getUser()->id;
		return View::make('yardsales.create')->with('postID',$userid);		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /yardsales
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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