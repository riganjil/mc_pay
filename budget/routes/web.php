<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@authenticate');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => 'auth_user'], function (){

    Route::get('/', 'HomeController@index');


    // category
    Route::get('/category', 'CategoryController@index');
    Route::get('/category/add', 'CategoryController@add');
    Route::post('/category', 'CategoryController@store');
    Route::get('/category/{id}', 'CategoryController@edit');
    Route::post('/category/{id}', 'CategoryController@update');
    // income
    Route::get('/income', 'IncomeController@index');
    Route::get('/income/add', 'IncomeController@add');
    Route::post('/income', 'IncomeController@store');
    Route::get('/income/{id}', 'IncomeController@edit');
    Route::post('/income/{id}', 'IncomeController@update');
    // expense
    Route::get('/expense', 'ExpenseController@index');
    Route::get('/expense/add', 'ExpenseController@add');
    Route::post('/expense', 'ExpenseController@store');
    Route::get('/expense/{id}', 'ExpenseController@edit');
    Route::post('/expense/{id}', 'ExpenseController@update');
    // user
    Route::get('/user', 'UserController@index');
    Route::get('/user/add', 'UserController@add');
    Route::post('/user', 'UserController@store');
    Route::get('/user/{id}', 'UserController@edit');
    Route::post('/user/{id}', 'UserController@update');
    // transaction
    Route::get('/transaction', 'TransactionController@index');
    Route::get('/profile', 'UserController@profile');
});
