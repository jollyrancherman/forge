<?php
dd(App::environment()); 

//test for environment
Route::get('/', function (){ dd(App::environment()); });