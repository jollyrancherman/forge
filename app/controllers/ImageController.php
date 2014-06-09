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
			//production
			// 'upload_dir' => "garageSale/$userid/",
			// 'upload_url' => "http://frauccitywide.com/garageSale/$userid/",
			
			//local 
			'upload_dir' => $_ENV['BLUEIMP_DIR']."$userid/",
			'upload_url' => $_ENV['CURRENT_BASE_ADDRESS']."garageSale/$userid/",
		];
		error_reporting(E_ALL | E_STRICT);
		$upload_handler = new UploadHandler($options);
	}
}