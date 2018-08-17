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


Route::get('/', 'indexController@start')->name('start');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::get('/admin', 'HomeController@home')->name('admin');

//Clientes
Route::get('/clientes/add', 'ClienteController@addClienteGet')->name('add');
Route::post('/clientes/add', 'ClienteController@addCliente')->name('add');
Route::get('/clientes/list', 'ClienteController@index')->name('index');
Route::get('/clientes/edit', 'ClienteController@GetCliente')->name('index');
Route::post('/clientes/edit', 'ClienteController@updateCliente')->name('index');

//Deportes
Route::get('/deporte/add', 'DeporteController@addClienteGet')->name('add');
Route::post('/deporte/add', 'DeporteController@addCliente')->name('add');
Route::get('/deporte/list', 'DeporteController@index')->name('index');
Route::get('/deporte/edit', 'DeporteController@GetCliente')->name('index');
Route::post('/deporte/edit', 'DeporteController@updateCliente')->name('index');




Route::get('/usuarios', 'UsuarioController@getUsuarios')->name('usuarios');



