<?php

class PaymentController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * GET /payment/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('payment.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /payment
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

}