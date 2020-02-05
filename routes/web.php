<?php

Route::get('/', function() {
    return view('main');
});
Route::post('exec', 'NaiveBayesController@index');