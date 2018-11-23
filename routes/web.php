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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/lijst', 'LijstjesController@index');
// Route::get('/lijst/create', 'LijstjesController@create');
// Route::post('/lijst/store', 'LijstjesController@store');
// Route::get('/lijst/{id}', 'LijstjesController@show');
// Route::delete('/lijst/{id}', 'LijstjesController@destroy');
// Route::get('/lijst/{id}/edit', 'LijstjesController@edit');
// Route::put('lijst/{id}', 'LijstjesController@update');
Route::resource('/lijst', 'LijstjesController');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ajax', 'AjaxController@index');
Route::get('/postajax', 'AjaxController@getAll');
Route::get('/wuuut', 'AjaxController@post');
