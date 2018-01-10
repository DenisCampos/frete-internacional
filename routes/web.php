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

    //pedidos
    Route::get('/pedidos/create', 'PedidosController@create')->name('pedidos.create');
    Route::get('/pedidos/store/{pacote}', 'PedidosController@store')->name('pedidos.store');
    Route::get('/pedidos', 'PedidosController@index')->name('pedidos.index');
    Route::get('/pedidos/aberto', 'PedidosController@aberto')->name('pedidos.aberto');
    Route::get('/pedidos/edit/{id}', 'PedidosController@edit')->name('pedidos.edit');
    Route::get('/pedidos/show/{id}', 'PedidosController@show')->name('pedidos.show');
    Route::get('/pedidos/enviar/{id}', 'PedidosController@enviar')->name('pedidos.enviar');
    Route::put('/pedidos/update/{id}', 'PedidosController@update')->name('pedidos.update');
    Route::get('/pedidos/destroy/{id}', 'PedidosController@destroy')->name('pedidos.destroy');

    //item pedidos
    Route::get('/itenspedido/{pedido}', 'ItensPedidoController@index')->name('itenspedido.index');
    Route::get('/itenspedido/{pedido}/create', 'ItensPedidoController@create')->name('itenspedido.create');
    Route::post('/itenspedido/{pedido}/store', 'ItensPedidoController@store')->name('itenspedido.store');
    Route::get('/itenspedido/{pedido}/destroy/{id}', 'ItensPedidoController@destroy')->name('itenspedido.destroy');

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