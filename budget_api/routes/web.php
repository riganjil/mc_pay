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
    return \Illuminate\Support\Facades\Hash::make("123");
    return $router->app->version();
});


$router->group(['prefix' => "api/v1"], function() use ($router){
    $router->post('login', 'AuthController@authenticate');

    $router->get('balance', 'BalanceController@index');
    // balance
    $router->get('category', 'CategoryController@index');
    $router->get('category/{id}', 'CategoryController@edit');
    $router->get('category/{id}/delete', 'CategoryController@delete');
    $router->post('category', 'CategoryController@store');
    $router->post('category/{id}', 'CategoryController@update');

    $router->get('transaction', 'TransactionController@index');
    $router->post('transaction', 'TransactionController@store');
    $router->get('transaction/total', 'TransactionController@total');
    // user
    $router->get('user', 'UserController@index');
    $router->get('user/{id}', 'UserController@edit');
    $router->post('user', 'UserController@store');
    $router->post('user/{id}', 'UserController@update');
});
