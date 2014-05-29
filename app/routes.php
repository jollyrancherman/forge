<?php

//test for environment
Route::get('/', function (){ dd(App::environment()); });