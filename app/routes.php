<?php

Route::get('/', function ()
{
	dd(App::environment());
});