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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Group
 */
Route::get('/groups', 'GroupController@index');

/**
 * Album
 */
Route::get('/albums/{category}', 'AlbumController@index');

/**
 * Photo
 */
Route::get('/photos/{category}/{album}', 'PhotoController@index');

/**
 * Event
 */
Route::get('/events', 'EventController@index');

/**
 * Cache
 */
Route::get('/caches/destroy', 'CacheController@destroy');
