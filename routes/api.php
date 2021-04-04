<?php

use Illuminate\Http\Request;

Route::get('/getfio/','fioController@getfio');
Route::post('/addfios/','fioController@addfios');
Route::patch('/updatefio/','fioController@updatefio');


Route::patch('/registerfio/','fioController@registerfio');

