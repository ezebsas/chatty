<?php

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

Route::get('/', [
	'uses' => 'HomeController@index',
	'as' => 'home',
]);

Route::get('/signup', [
	'uses' => 'AuthController@getSignup',
	'as' => 'auth.signup',
	'middleware' => ['guest'],
]);


Route::post('/signup', [
	'uses' => 'AuthController@postSignup',
	'middleware' => ['guest'],
]);

Route::get('/signin', [
	'uses' => 'AuthController@getSignin',
	'as' => 'auth.signin',
	'middleware' => ['guest'],
]);


Route::post('/signin', [
	'uses' => 'AuthController@postSignin',
	'middleware' => ['guest'],
]);

Route::get('/signout', [
	'uses' => 'AuthController@getSignout',
	'as' => 'auth.signout',
]);


Route::get('/search', [
	'uses' => 'SearchController@getResults',
	'as' => 'search.results',
]);

/*User Profile*/

Route::get('/user/{username}', [
	'uses' => 'ProfileController@getProfile',
	'as' => 'profile.index',
]);


Route::get('profile/edit', [
	'uses' => 'ProfileController@getEdit',
	'as' => 'profile.edit',
	'middleware' => ['auth'],
]);

Route::post('profile/edit', [
	'uses' => 'ProfileController@postEdit',
	'middleware' => ['auth'],
]);

Route::get('/friends', [
	'uses' => 'FriendController@getIndex',
	'as' => 'friend.index',
	'middleware' => ['auth'],
]);