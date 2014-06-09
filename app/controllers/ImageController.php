<?php

use app\Acme\UploadHandler;

class ImageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /image.php
	 *
	 * @return Response
	 */
	public function index()
	{
			
		$userid = Sentry::getUser()->id;

		$options = [
			'upload_dir' => "public/garageSale/$userid/",
			'upload_url' => "http://localhost:8000/garageSale/$userid/",
		];
		error_reporting(E_ALL | E_STRICT);
		$upload_handler = new UploadHandler($options);
	}
}