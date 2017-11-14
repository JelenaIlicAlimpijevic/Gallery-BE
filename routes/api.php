<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'Auth\LoginController@authenticate');
Route::post('register', 'Auth\RegisterController@create');

Route::middleware('jwt')->post('/galleries', 'GalleryController@store');
Route::middleware('jwt')->get('/galleries', 'GalleryController@index');
Route::middleware('jwt')->put('/galleries/{id}', 'GalleryController@update');
Route::middleware('jwt')->delete('/galleries/{id}', 'GalleryController@destroy');
Route::middleware('jwt')->get('/galleries/{id}', 'GalleryController@show');
Route::middleware('jwt')->post('/galleries/{id}/comments', 'CommentsController@store');