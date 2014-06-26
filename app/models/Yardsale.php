<?php

class Yardsale extends \Elegant {

	protected $fillable = ['area','address', 'title', 'description', 'lat', 'lng'];

	protected $rules = [
		"area" => 'required',
		"address" => 'required',
		"title" => 'required',
	];

	public $table = 'Yardsales';

	protected function getVisibility($id)
	{
		$visible = Yardsale::where('user_id', '=', $id)->first();
		return !is_null($visible) ? $visible : 0 ;
	}
}