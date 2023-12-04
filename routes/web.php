<?php

use Illuminate\Support\Facades\Route;

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


Route::resource('servicos', ServicoController::class);
Route::resource('users', UserController::class);
//Route::resource('pedido', PedidoController::class);
Route::get('/', 'SiteController@index')->name('site.index');
Route::get('pedido/create/{id}', 'PedidoController@create')->name('pedido.create')->middleware('auth');
Route::post('pedido/store', 'PedidoController@store')->name('pedido.store')->middleware('auth');
Route::get('pedidos', 'PedidoController@index')->name('pedido.index')->middleware('auth');
Route::get('meus-pedidos', 'PedidoController@meusPedidos')->name('meus.pedidos')->middleware('auth');
Route::delete('pedido/{id}', 'PedidoController@destroy')->name('pedido.destroy')->middleware('auth');
//Autenticação
Route::post('auth', 'LoginController@auth')->name('login.auth');
Route::view('login','login.form')->name('login');
Route::get('logout','LoginController@logout')->name('login.logout')->middleware('auth');
Route::get('register','LoginController@register')->name('login.create');
//Entrega
Route::get('entrega/create/{id}','EntregaController@create')->name('entrega.create')->middleware('auth');
Route::post('entrega/store', 'EntregaController@store')->name('entrega.store')->middleware('auth');
//Relatorio e Grafico
Route::get('relatorio', 'RelatorioController@createReport')->name('relatorio')->middleware('auth');
Route::get('grafico', 'GraficoController@loadDataGraphs')->name('grafico');