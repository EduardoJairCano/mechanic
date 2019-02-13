<?php

//  namespace: es el contenedor para el código que se desea emplear o trabajar
namespace  mechanicus\Http\Controllers;

//  Se declara el archivo, como tipo libreria, la ruta de los archivos externos que se van a emplear aqui
use mechanicus\Http\Controllers\Controller;

//  Nombre de la Clase, la cual heredea por medio la palabra EXTENDS lo que contiene en este caso controller
class PruebaController extends Controller {

    // Función del controlador, la cual puede recibir parámetros e iterar con ellos, en este caso, los recibe desde la URL
    public function prueba($name) {
        return "Hola ".$name.", estas dentro del controlador de prueba";
    }
}
