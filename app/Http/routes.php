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

$app->get('/makes', 'MakesController@index');
$app->post('/makes', 'MakesController@store');
$app->get('/makes/{id}', 'MakesController@show');
$app->patch('/makes/{id}', 'MakesController@update');

$app->get('/models', 'ModelsController@index');
$app->post('/models', 'ModelsController@store');
$app->get('/models/{id}', 'ModelsController@show');
$app->patch('/models/{id}', 'ModelsController@update');

$app->get('/vehicles', 'VehiclesController@index');
$app->post('/vehicles', 'VehiclesController@store');
$app->get('/vehicles/{id}', 'VehiclesController@show');
$app->patch('/vehicles/{id}', 'VehiclesController@update');
$app->delete('/vehicles/{id}', 'VehiclesController@destroy');
