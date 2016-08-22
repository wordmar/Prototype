<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('login');
});

Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

Route::get('/create', 'RequirementsController@create');
Route::post('/store', 'RequirementsController@store');

Route::post('/requirements/{req_id?}/edit', 'RequirementsController@edit');
Route::get('/requirements/{req_id?}/edit', 'RequirementsController@edit');
Route::post('/requirements/{req_id?}/update', 'RequirementsController@update');

//Route::post('/requirements/delete', 'RequirementsController@delete');
Route::post('/requirements/{req_id?}/destroy', 'RequirementsController@destroy');

Route::get('/requirements/showAll', 'RequirementsController@showAll');
Route::get('/requirements/{req_id?}/show', 'RequirementsController@show');


