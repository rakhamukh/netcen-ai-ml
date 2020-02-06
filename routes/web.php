<?php

Route::get('/', 'NaiveBayesController@index');
Route::post('exec', 'NaiveBayesController@exec');