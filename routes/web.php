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

Route::group(['prefix'=>'admin','namespace'=>'admin','middleware'=>['auth','admin']],function(){
    Route::get('/','DashboardController@dashboard')->name('admin.index');
    Route::get('category/create','DashboardController@createCategory')->name('admin.category.create');
    Route::post('category/create','DashboardController@addCategory');
    Route::get('record/create','DashboardController@createRecord')->name('admin.record.create');
    Route::get('category/{id}/delete','DashboardController@deleteCategory');
    Route::post('record/create','DashboardController@addRecord');
});

Route::group(['prefix'=>'user','namespace'=>'user','middleware'=>['auth']],function(){
    Route::get('/','UserController@index')->name('user.index');
});

Route::get('category/{category}','Category\CategoryController@show');
Route::get('/user/{id}', 'User\UserController@showProfile')->name('user.profile');

Route::get('/','Main\MainController@index');

Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
