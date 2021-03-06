<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ping', function() {
    return ['pong' => true];
});
*/

Route::get('/401', 'AuthController@unauthorized')->name('login');

//Route::get('/random', 'BarberController@random');

Route::post('/auth/login', 'AuthController@login');
Route::post('/auth/logout', 'AuthController@logout');
Route::post('/auth/refresh', 'AuthController@refresh');
Route::post('/user', 'AuthController@create');

Route::get('/user', 'UserController@read');
Route::put('/user', 'UserController@update');
Route::post('/user/avatar', 'UserController@updateAvatar');
Route::get('/user/favorites', 'UserController@getFavorites');
Route::post('/user/favorite', 'UserController@toggleFavorite');
Route::get('/user/appointments', 'UserController@getAppointments');

Route::get('/barbers', 'BarberController@list');
Route::get('/barber/{id}', 'BarberController@one');
Route::post('/barber/{id}/appointment', 'BarberController@setAppointment');
Route::get('/search', 'BarberController@search');