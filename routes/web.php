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
Route::get('/admin/clientes/add', 'ClienteController@addClienteGet')->name('add_cliente');
Route::post('/clientes/add', 'ClienteController@addCliente')->name('add');
Route::get('admin/clientes/list', 'ClienteController@index')->name('index');
Route::get('/clientes/edit/{id}', 'ClienteController@updateCliente')->name('edit_cliente');
Route::post('/clientes/edit', 'ClienteController@saveUpdateCliente')->name('update_cliente');

//Deportes
Route::get('/deporte/add', 'DeporteController@addClienteGet')->name('add');
Route::post('/deporte/add', 'DeporteController@addCliente')->name('add');
Route::get('/deporte/list', 'DeporteController@index')->name('index');
Route::get('/deporte/edit', 'DeporteController@GetCliente')->name('index');
Route::post('/deporte/edit', 'DeporteController@updateCliente')->name('index');



Route::get('/changeLang/{lang}', 'indexController@changeLang')->name('start');

Route::get('/usuarios', 'UsuarioController@getUsuarios')->name('usuarios');

Route::post('/getEstados', 'indexController@getEstados')->name('estados');
Route::post('/getPais', 'indexController@getPais')->name('pais');



//Membresia controller
Route::get('/admin/membresia/addMembresia', 'MembresiaController@getAdd')->name('addMembresia');
Route::post('/admin/membresia/saveMembresia', 'MembresiaController@addMebrecia')->name('saveMembresia');
Route::get('/admin/membresia/index', 'MembresiaController@index')->name('list_membresia');

Route::post('/admin/membresia/changeStatus', 'MembresiaController@activeInactiveMembresia')->name('activeInactive_membresia');
Route::get('/admin/membresia/membresia/{id}', 'MembresiaController@getMembresiaById')->name('getMembresia');
Route::post('/admin/membresia/membresia/save', 'MembresiaController@updateMembrecia')->name('editMembresia');

