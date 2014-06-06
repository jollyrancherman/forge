<?php

class Registration extends \Eloquent {
	protected $fillable = ['email', 'password'];

	protected $table = 'users';

	public static $rules = array(
    'email'=>'required|email|unique:users',
    'password'=>'required|alpha_num|between:6,30',
   );
}