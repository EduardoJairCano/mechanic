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


/* Ruta controlador
    Para emplear una ruta-controlador, solo es necesario asignar la URL de navegación, y en la otra sección el nombre
    del controlador, en caso de de querer utilizar una función propia del controlador, se separa por un @

        Route::get( </URL>, <Controlador@Función> );
*/
Route::get('/prueba/{name?}', 'PruebaController@prueba');


/*  Ruta Controllador Resource
    Esta ruta es empleada para iterar con datos en respecto a alguna variable, objeto o modelo, en este caso como no se
        selecciona alguna función en específico, se ejecuta el index del controlador.
    Para cada una de las acciones posibles para este controlador, es necesario escribir el tipo de acción HTTP adecuado.
*/
Route::resource('/cliente', 'ClientesController');
