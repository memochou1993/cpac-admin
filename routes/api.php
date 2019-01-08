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
Route::get('/gallery/categories', 'Gallery\CategoryController@index');
Route::get('/gallery/albums', 'Gallery\AlbumController@index');
Route::get('/gallery/photos', 'Gallery\PhotoController@index');

/**
 * Cache
 */
Route::get('/caches/destroy', 'CacheController@destroy');

/**
 * Link
 */
Route::get('/links', 'LinkController@index');
