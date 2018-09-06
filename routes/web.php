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
Route::get('/admin/clientes/addCliente', 'ClienteController@addClienteGet')->name('add_cliente_view');
Route::post('/admin/clientes/add', 'ClienteController@addCliente')->name('add');
Route::get('admin/clientes/list', 'ClienteController@index')->name('list_clientes');
Route::get('/admin/clientes/edit/{id}', 'ClienteController@updateCliente')->name('edit_cliente');
Route::post('/admin/clientes/edit', 'ClienteController@saveUpdateCliente')->name('update_cliente');
Route::post('/admin/cliente/changeStatus', 'ClienteController@deleteCliente')->name('activeInactive_cliente');

//Deportes
Route::get('/admin/deporte/add', 'DeporteController@addDeporte')->name('addDeporte');
Route::post('/admin/deporte/add', 'DeporteController@saveDeporte')->name('save_deporte');
Route::get('/admin/deporte/list', 'DeporteController@index')->name('list_deportes');
Route::get('/admin/deporte/edit', 'DeporteController@GetCliente')->name('edit_deporte');
Route::post('/admin/deporte/edit', 'DeporteController@updateCliente')->name('edit_deporte');
Route::post('/admin/deporte/changeStatus', 'DeporteController@deleteDeporte')->name('activeInactive_deporte');




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

