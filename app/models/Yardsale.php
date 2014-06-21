<?php

class Yardsale extends \Elegant {

	protected $fillable = ['area','address', 'title', 'description', 'lat', 'lng'];

	protected $rules = [
		"area" => 'required',
		"address" => 'required',
		"title" => 'required',
	];

	public $table = 'Yardsales';
}