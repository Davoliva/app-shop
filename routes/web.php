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

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//CRUD
Route::get('/admin/products', 'ProductController@index');//Listado
Route::get('/admin/products/create', 'ProductController@create');//Crear formulario
Route::post('/admin/products', 'ProductController@store');//Guardar los datos que escribe en el formulario
Route::get('/admin/products/{id}/edit', 'ProductController@edit');//formulario edición
Route::post('/admin/products/{id}/edit', 'ProductController@update'); //actualizar
Route::delete('/admin/products/{id}', 'ProductController@destroy'); //eliminar
