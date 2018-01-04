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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/edit', 'HomeController@edit')->name('edit');
Route::get('/editpassword', 'HomeController@editpassword')->name('editpassword');
Route::put('/update', 'HomeController@update')->name('update');
Route::put('/updatepassword', 'HomeController@updatepassword')->name('updatepassword');


Route::get('/pacotes', 'PacotesController@index')->name('pacotes.index');
