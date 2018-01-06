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

Route::group(['middleware'=>'auth'], function () {

    //usuario
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/edit', 'HomeController@edit')->name('edit');
    Route::get('/editpassword', 'HomeController@editpassword')->name('editpassword');
    Route::put('/update', 'HomeController@update')->name('update');
    Route::put('/updatepassword', 'HomeController@updatepassword')->name('updatepassword');

    //pacotes
    Route::get('/pacotes', 'PacotesController@index')->name('pacotes.index');


    Route::group(['middleware' => 'check-permission:admin'], function () {

        //pacotes
        Route::get('/pacotes/show', 'PacotesController@show')->name('pacotes.show');
        Route::get('/pacotes/edit/{id}', 'PacotesController@edit')->name('pacotes.edit');
        Route::post('/pacotes/updatestatus', 'PacotesController@updatestatus')->name('pacotes.updatestatus');
        Route::get('/pacotes/create', 'PacotesController@create')->name('pacotes.create');
        Route::post('/pacotes/store', 'PacotesController@store')->name('pacotes.store');
        Route::get('/pacotes/destroy/{id}', 'PacotesController@destroy')->name('pacotes.destroy');
        Route::put('/pacotes/update/{id}', 'PacotesController@update')->name('pacotes.update');

        //usuarios
        Route::get('/usuarios', 'UsuariosController@index')->name('usuarios.index');
        Route::get('/usuarios/edit/{id}', 'UsuariosController@edit')->name('usuarios.edit');
        Route::get('/usuarios/destroy/{id}', 'UsuariosController@destroy')->name('usuarios.destroy');
        Route::put('/usuarios/update/{id}', 'UsuariosController@update')->name('usuarios.update');

    });

});