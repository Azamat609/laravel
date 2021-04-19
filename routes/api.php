<?php

use Illuminate\Http\Request;

Route::get('/getfio/','fioController@getfio');
Route::post('/addfios/','fioController@addfios');
Route::patch('/updatefio/','fioController@updatefio');


Route::patch('/registerfio/','fioController@registerfio');
Route::patch('/avtorfio/','fioController@avtorfio');

Route::patch('/registerValidate/','fioController@registerValidate');
Route::patch('/loginValidate/','fioController@loginValidate');
Route::patch('/logout/','fioController@logout');

Route::post('/getOvo/','OvoController@getOvo');
Route::post('/addOvo/','OvoController@addOvo');
Route::post('/deletOvo/','OvoController@deletOvo');