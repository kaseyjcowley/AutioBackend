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

$app->get('/makes',        ['uses' => 'MakesController@index',  'as' => 'makes.index']);
$app->post('/makes',       ['uses' => 'MakesController@store',  'as' => 'makes.store']);
$app->get('/makes/{id}',   ['uses' => 'MakesController@show',   'as' => 'makes.show']);
$app->patch('/makes/{id}', ['uses' => 'MakesController@update', 'as' => 'makes.update']);

$app->get('/models',        ['uses' => 'ModelsController@index',  'as' => 'models.index']);
$app->post('/models',       ['uses' => 'ModelsController@store',  'as' => 'models.store']);
$app->get('/models/{id}',   ['uses' => 'ModelsController@show',   'as' => 'models.show']);
$app->patch('/models/{id}', ['uses' => 'ModelsController@update', 'as' => 'models.update']);

$app->get('/vehicles',         ['uses' => 'VehiclesController@index',   'as' => 'vehicles.index');
$app->post('/vehicles',        ['uses' => 'VehiclesController@store',   'as' => 'vehicles.store');
$app->get('/vehicles/{id}',    ['uses' => 'VehiclesController@show',    'as' => 'vehicles.show');
$app->patch('/vehicles/{id}',  ['uses' => 'VehiclesController@update',  'as' => 'vehicles.update');
$app->delete('/vehicles/{id}', ['uses' => 'VehiclesController@destroy', 'as' => 'vehicles.destroy');
