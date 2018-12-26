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
 * Gallery
 */
Route::get('/albums/{group}', 'AlbumController@index');
Route::get('/photos/{group}/{album}', 'PhotoController@index');

/**
 * Memorabilia
 */
Route::get('/events', 'EventController@index');

/**
 * Cache
 */
Route::get('/caches/destroy', 'CacheController@destroy');