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

Route::get('/', ['as' => 'home', 'uses' => 'PageController@getHome']);
Route::get('order', ['as' => 'order', 'uses' => 'PageController@getOrder']);
Route::get('menu/{id}', ['as' => 'menu', 'uses' => 'PageController@getMenuid']);

Route::get('showmeals', ['as' => 'showmeals', 'uses' => 'PageController@getMenu']);

Route::get('delete/{id}', ['as' => 'delete', 'uses' => 'PageController@getDelete']);

Route::get('updateform/{id}', ['as' => 'updateform', 'uses' => 'PageController@getUpdateForm']);



Route::get('admin', ['as' => 'admin', 'uses' => 'PageController@getAdmin']);
Route::get('editmeals', ['as' => 'editmeals', 'uses' => 'PageController@getEditMeals']);


Route::post('update/{id}', ['as' => 'update', 'uses' => 'PageController@postUpdate']);
Route::post('editmeals', ['as' => 'editmeals', 'uses' => 'PageController@postEditMeals']);
Route::post('add-order',  ['as' => 'add-order', 'uses' =>'PageController@postAddOrder']);
Route::post('del-order',  ['as' => 'del-order', 'uses' =>'PageController@postDelOrder']);
Route::post('playment',  ['as' => 'payment', 'uses' =>'PageController@postPayment']);



// Authentication routes...
Route::get('auth/login',  ['as' => 'login', 'uses' =>'Auth\AuthController@getLogin']);
Route::post('auth/login',  ['as' => 'login', 'uses' =>'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register',  ['as' => 'register', 'uses' =>'Auth\AuthController@getRegister']);
Route::post('auth/register',  ['as' => 'register', 'uses' =>'Auth\AuthController@postRegister']);