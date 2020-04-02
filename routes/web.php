<?php

Route::get('/', 'NaiveBayesController@index');
Route::post('exec', 'NaiveBayesController@execTrain');
Route::post('result', 'NaiveBayesController@execTest');