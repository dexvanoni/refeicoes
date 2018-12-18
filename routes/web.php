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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/gestao', 'GestaoController@index')->name('gestao');
Route::resource('clientes', 'ClientesController');
Route::resource('produtos', 'ProdutosController');
Route::resource('pedidos', 'PedidosController');
Route::get('pagar/{id}', 'PedidosController@pagar')->name('pagar');
Route::get('cobrar/{id}', 'PedidosController@cobrar')->name('cobrar');

Route::resource('relatorios', 'RelatoriosController');
Route::post('relatorios.pes_mes', 'RelatoriosController@pes_mes')->name('relatorios.pes_mes');

Route::get('generate-pdf/{cliente}','ClientesController@generatePDF')->name('generate-pdf');