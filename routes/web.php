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

Route::get('/', 'Basic\BasicController@index');

Route::get('/tasks/{task}', function ($id) {

	$task = DB::table('tasks')->find($id);

	dd($task);

});

Route::get('foo/{id?}', function($id = 'Andrew') {
	return 'Hello,' . $id;
})->where(['id' => '[A-Za-z]+']);

Route::get('main', 'Main\MainController@index');

Route::resource('photo', 'PhotoController', ['only' => [
		'index', 'show'
	]]);

Route::resource('photo', 'PhotoController', ['except' => [
		'create', 'store', 'update', 'destroy'
	]]);

Route::get('user/{id}', 'UserController@update');

Route::post('main','Main\MainController@postRegister');

Route::get('/cookie/set','CookieController@setCookie');

Route::get('/cookie/get','CookieController@getCookie');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
