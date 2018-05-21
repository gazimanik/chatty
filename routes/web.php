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
    'uses' => '\Chatty\Http\Controllers\HomeController@index',
    'as' => 'index',
]);

Route::get('/alert', function () {
    return redirect()->route('index')->with('info','you have signed up');
});

Route::get('/signup', [
    'uses' => '\Chatty\Http\Controllers\AuthController@getSignup',
    'as' => 'auth.signup',
    'middleware' => ['guest'],
]);

Route::post('/signup', [
    'uses' => '\Chatty\Http\Controllers\AuthController@postSignup',
    'middleware' => ['guest'],
]);

Route::get('/login', [
    'uses' => '\Chatty\Http\Controllers\AuthController@getLogin',
    'as' => 'auth.login',
    'middleware' => ['guest'],
]);

Route::post('/login', [
    'uses' => '\Chatty\Http\Controllers\AuthController@postLogin',
    'middleware' => ['guest'],
]);

Route::get('/logout', [
    'uses' => '\Chatty\Http\Controllers\AuthController@getLogout',
    'as' => 'auth.logout',
]);

Route::get('/search', [
    'uses' => '\Chatty\Http\Controllers\SearchController@getResult',
    'as' => 'search.result',
]);

Route::get('/user/{username}', [
    'uses' => '\Chatty\Http\Controllers\ProfileController@getProfile',
    'as' => 'profile.index',
]);

Route::get('/profile/edit', [
    'uses' => '\Chatty\Http\Controllers\ProfileController@getEdit',
    'as' => 'profile.edit',
    'middleware' => ['auth'],
]);

Route::post('/profile/edit', [
    'uses' => '\Chatty\Http\Controllers\ProfileController@postEdit',
    'middleware' => ['auth'],
]);

Route::get('/friends', [
    'uses' => '\Chatty\Http\Controllers\FriendController@getIndex',
    'as' => 'friend.index',
    'middleware' => ['auth'],
]);

Route::get('/friends/add/{username}', [
    'uses' => '\Chatty\Http\Controllers\FriendController@getAdd',
    'as' => 'friend.add',
    'middleware' => ['auth'],
]);

Route::get('/friends/accept/{username}', [
    'uses' => '\Chatty\Http\Controllers\FriendController@getAccept',
    'as' => 'friend.accept',
    'middleware' => ['auth'],
]);

Route::post('/status', [
    'uses' => '\Chatty\Http\Controllers\StatusController@postStatus',
    'as' => 'status.post',
    'middleware' => ['auth'],
]);

Route::post('/status/{statusId}/reply', [
    'uses' => '\Chatty\Http\Controllers\StatusController@postReply',
    'as' => 'status.reply',
    'middleware' => ['auth'],
]);

Route::get('/status/{statusId}/like', [
    'uses' => '\Chatty\Http\Controllers\StatusController@getLike',
    'as' => 'status.like',
    'middleware' => ['auth'],
]);