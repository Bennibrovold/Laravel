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
    Route::get('/options','DashboardController@options')->name('admin.options');
    Route::get('/users','DashboardController@users')->name('admin.users');
    Route::get('/users/{name?}','DashboardController@users')->name('admin.users');
    Route::delete('/users/{name}/delete','DashboardController@usersDelete')->name('admin.users.destroy');
    Route::get('/create','DashboardController@Create')->name('admin.create');
    Route::post('category/create','DashboardController@addCategory')->name('admin.category.create');
    Route::get('category/{id}/delete','DashboardController@deleteCategory');
    Route::post('record/create','DashboardController@addRecord')->name('admin.record.create');
    Route::post('image/upload','DashboardController@UploadImageCk')->name('admin.image.upload');
    Route::get('counter/get','DashboardController@counter')->name('admin.counter');
});

Route::group(['prefix'=>'user','namespace'=>'user','middleware'=>['auth']],function(){
    Route::get('/edit','UserController@index')->name('user.index');
    Route::delete('/delete','UserController@index')->name('user.index');
    Route::get('/friends','UserController@index')->name('user.index');
});
Route::get('/category/{category}','Main\MainController@categoryShow')->name('caregory.show');
Route::get('/json/get','Main\MainController@getTable')->name('json.get');
Route::get('/category/{category?}/{record?}','Main\MainController@show')->name('record.show');

Route::get('/vk','vk@index')->name('vk.index');

Route::post('/count','Main\MainController@getNews')->name('news.get');

Route::get('/user/{id}', 'User\UserController@showProfile')->name('user.profile');

Route::get('/','Main\MainController@index');

Route::group(['prefix' => 'vue','as' => 'vue','namespace' => 'vue'],function(){
  Route::get('/','Vue@index')->name('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
