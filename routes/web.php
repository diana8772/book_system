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
    return view('welcome1');
});

Auth::routes();
// Route::get('firebase','aaaController@index');
// Route::get('firebase-get-data', 'aaaController@getData');

// Route::get('/home', 'HomeController@index')->name('home');
// Route::match(['get', 'post'],'/','bookController@welcome');
Route::match(['get', 'post'],'/home','HomeController@index')->name('home');
Route::match(['get', 'post'],'/comment','commentController@index');
Route::match(['get', 'post'],'/comment/save','commentController@index');
// Route::match(['get', 'post'],'/','HomeController@welcome1');
Route::match(['get', 'post'],'/book','bookController@index');
Route::match(['get', 'post'],'/book/detail','bookController@detail');
Route::match(['get', 'post'],'/personal_list','bookController@personal');
