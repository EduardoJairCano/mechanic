<?php
/*  Controller Resource
    Este tipo de controlador ees utilizado para interactuar con datos, de manera que es posible gestionar datos desde
        las funciones propias de este controlador
*/
namespace mechanicus\Http\Controllers;

use http\Client;
use Illuminate\Http\Request;
use mechanicus\Cliente;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
         * Por medio del metodo all() para la el modelo Cliente obtenemos todos los registros de dicho modelo que se
         * encuentran en la base de datos
        */
        $clientes = Cliente::all();

        /*
         * Creación de una vista tipo indice: la cual servirá como acceso a demás recursos.
         * La función que se utiliza como parámetro en el return llamada compact(), lo que realiza es comunicar los datos
         * que se encuentran almacenados en alguna variable dentro de esta funcion  */
        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Asignación de la vista que regresará la función create
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Para agregar los datos de una entidad, en este caso un nuevo cliente dentro de la base de datos, es neceario
        instanciar los elementos obtenidos a un objeto y con el guardarlo en la base de datos por medio de la función save() */
        $cliente = new Cliente();
        $cliente->nombre = $request->input('nombre');
        $cliente->domicilio = $request->input('domicilio');
        $cliente->save();
        return 'Cliente agregado exitosamente';

        /* Regresa un campo en específico
        return $request->input('nombre');
        */

        /* Regresa todos los datos que son enviados por los formularios
        return $request->all();
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}