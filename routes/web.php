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

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index');



Route::resource('pasals', 'pasalController');

Route::resource('kecelakaans', 'kecelakaanController');

Route::get('getMapKecelakaan/{id}', 'kecelakaanController@getMapKecelakaan')->name('getMapKecelakaan');
Route::get('getCenterKecelakaan/{id}', 'kecelakaanController@getCenterKecelakaan')->name('getCenterKecelakaan');


Route::resource('kendaraans', 'kendaraanController');

Route::resource('korbanKendaraans', 'korban_kendaraanController');

Route::resource('korbanKecelakaans', 'korban_kecelakaanController');



Route::resource('tilangs', 'tilangController');