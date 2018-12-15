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

Route::get('/', function()
{
	return "welcome to the testing app";
});

Route::post('users', 'UserController@addUserData');

Route::post('login', 'UserController@login');

Route::middleware('jwt.auth')->get('users', function() {
    return auth('api')->user;
    
});

// Route::group([
// 	'middleware' => 'api',
// 	'prefix' => 'test'
// ], function($router)
// {
	Route::get('posts','AccessorController@getPostData');

	Route::get('post/{id}', 'AccessorController@getPostDataById');

	Route::put('post/{id}', 'AccessorController@updatePostData');

	Route::get('post-delete/{id}', 'AccessorController@deletePostData');

	Route::post('posts', 'AccessorController@addPostData');

// });
Route::post('logout', 'UserController@logout');










