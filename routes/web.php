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

Route::get('/', 'BeritaController@dashboard');
Route::get('item/{slug}', 'BeritaController@detail');

Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('login', 'Auth\LoginController@postLogin');
Route::get('register', 'Auth\RegisterController@getRegister');
Route::post('register', 'Auth\RegisterController@postRegister');
Route::get('logout', 'Auth\LoginController@getLogout');

Route::group(['prefix' => 'users'], function() {
  Route::get('/', 'UserController@index');
  Route::get('users/delete/{id}', 'UserController@delete');
  Route::get('activate/{id}', 'UserController@activate');
  Route::get('deactivate/{id}', 'UserController@deactivate');
});

Route::group(['prefix' => 'categories'], function() {
  Route::get('/', 'KategoriController@index');
  Route::get('create', 'KategoriController@create');
  Route::post('create', 'KategoriController@save');
  Route::get('edit/{id}', 'KategoriController@edit');
  Route::post('edit', 'KategoriController@update');
  Route::get('delete/{id}', 'KategoriController@delete');
  Route::get('activate/{id}', 'KategoriController@activate');
  Route::get('deactivate/{id}', 'KategoriController@deactivate');
});

Route::group(['prefix' => 'news'], function() {
  Route::get('/', 'BeritaController@index');
  Route::get('create', 'BeritaController@create');
  Route::post('create', 'BeritaController@save');
  Route::get('edit/{id}', 'BeritaController@edit');
  Route::post('edit', 'BeritaController@update');
  Route::get('delete/{id}', 'BeritaController@delete');
  Route::get('activate/{id}', 'BeritaController@activate');
  Route::get('deactivate/{id}', 'BeritaController@deactivate');
});

Route::group(['prefix' => 'comments'], function() {
  Route::get('/', 'KomentarController@index');
  Route::post('create', 'KomentarController@save');
  Route::get('delete/{id}', 'KomentarController@delete');
  Route::get('activate/{id}', 'KomentarController@activate');
  Route::get('deactivate/{id}', 'KomentarController@deactivate');
});
