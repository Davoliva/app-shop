<?php

//use Symfony\Component\Routing\Annotation\Route;
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

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*aplicando un middleware en un grupo de rutas*/
// 'auth' se agrego para que ejecute el middleware de autenticación y luego ejecuta el middleware para preguntar si es administrador o usuario
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    //CRUD
    Route::get('/products', 'ProductController@index');//Listado
    Route::get('/products/create', 'ProductController@create');//Crear formulario
    Route::post('/products', 'ProductController@store');//Guardar los datos que escribe en el formulario
    Route::get('/products/{id}/edit', 'ProductController@edit');//formulario edición
    Route::post('/products/{id}/edit', 'ProductController@update'); //actualizar
    Route::delete('/products/{id}', 'ProductController@destroy'); //eliminar

    Route::get('/products/{id}/images', 'ImageController@index');
    Route::post('/products/{id}/images', 'ImageController@store'); //guardar imagenes
    Route::delete('/products/{id}/images', 'ImageController@destroy'); //eliminar imagenes
    Route::get('/products/{id}/images/select/{image}', 'ImageController@select'); //destacar imagen
});


