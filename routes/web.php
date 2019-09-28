<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('activities',  ['uses' => 'ActivityController@index']);
    $router->post('activities',  ['uses' => 'ActivityController@store']);
    $router->delete('activities/{id}',  ['uses' => 'ActivityController@destroy']);
    $router->patch('activities/{id}',  ['uses' => 'ActivityController@update']);

    $router->get('category',  ['uses' => 'CategoryController@index']);
});
