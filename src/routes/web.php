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

Route::get('/home', 'HomeController@index');
Route::post('/home', 'HomeController@post');
Route::get('/edit/{id}', 'HomeController@editGet');
Route::get('/delete/{id}', 'HomeController@delete');
Route::post('/save', 'HomeController@editSave');
Route::get('/admin', 'AdminController@index');
Route::post('/changetype', 'AdminController@changetype');
Route::get('/search', 'AdminController@search');
