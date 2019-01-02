<?php

use Illuminate\Pagination\getLinks;
use App\Http\Controllers\AdminController;

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

// Home route

Route::get('/', 'HomeController@index');

// Dashboard routes

Route::get('admin', 'AdminController@getIndex');
Route::post('admin', 'AdminController@postIndex');
Route::get('admin/user', 'AdminController@getUser');
Route::post('admin/user', 'AdminController@postUser');
Route::get('admin/links', 'AdminController@getLinks');

// Authentication routes

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
Route::post('register', 'Auth\AuthController@postRegister');

// Link routes

Route::resource('link', 'LinksController');
Route::get('links', 'LinksController@index');
Route::get('{hash}', 'LinksController@show');