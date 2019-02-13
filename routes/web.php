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
    return view('welcome');
});


// Primera ruta
Route::get('/hola_mundo', function(){
    return 'Hola mundo';
});


/*  Ruta con parametros
    Es posible agregar parámetros en las rutas, los cuales pueden ser :
        - Opcionales.           <{%parametro}>?
        - Valor por default     $parametro = <valor_por_default>
*/
Route::get('/name/{name}/{lastname?}', function($name, $lastname = null) {
    return "Bienvenido ".$name ." ". $lastname;
});


