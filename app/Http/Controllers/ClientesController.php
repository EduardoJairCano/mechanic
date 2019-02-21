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
        /* ** Validate() **
        Cuando se crea un nuevo registro, es necesario validar cada uno de los atributos que se desean
        agregar a la base de datos, para ello se utiliza la funación validate(), la cual se le realiza al
        request que contiene los datos a almacenar, previo a la validación, se asignan a un nueva variable.

        En caso de no cumplir con los requerimientos solicitados, es posible hacerle saber al usuario que
        es lo que esta fallando al momento de la captura, dado que la variable que declaramos para la
        validación se almacena en middleare del tipo error, es posible validar si existe algun tipo de
        error o no en la captura, esta iteración se declara en la vista correspondiente
          */
        $validaredData = $request->validate([
            'nombre' => 'required|max: 25',
            'domicilio' => 'required|mas: 35'
        ]);

        /* La manera de trabajar con archivos y una base de datos es por medio del almacenamiento del nombre del archivo
        primero se comprueba si existe un atributo del tipo file y despues se hace la obtención de los datos del mismo,
        se iguala el nombre a una variable y se le puede agregar el tiempo como parametro complementario y asi evitar
        que el nombre del archivo se repita. Previo a ello almacenamos la imagen en un directorio con la función move()*/
        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $name_file = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name_file);
        }
        else{
            $name_file = 'default_avatar.png';
        }

        /* Para agregar los datos de una entidad, en este caso un nuevo cliente dentro de la base de datos, es neceario
        instanciar los elementos obtenidos a un objeto y con el guardarlo en la base de datos por medio de la función save() */
        $cliente = new Cliente();
        $cliente->nombre = $request->input('nombre');
        $cliente->domicilio = $request->input('domicilio');
        $cliente->avatar = $name_file;
        $cliente->slug = $cliente->nombre.time();
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
    public function show(Cliente $cliente)
    {
        /*
        ** Método por ID **
        public function show($id) { ...
        -- Se tendra que buscar dentro de la base de datos por medio de la busqueda de un
            atributo en especifico, en este caso seria el ID de la tabla, por medio de la función propia
            de Eloquent find()
        --
            $cliente = Cliente::find($id);
        -- En caso de querer implementar solo el uso de un valor Id e instanciar un objeto
            para la función, se emplea dicho atributo como parámetro.
        --

        ** Método Implicit Binding **
        public function show(Cliente $cliente) { ...
        -- En caso de no querer instanciar el objeto en la función  en la cual como parámetro se
            obtiene un modelo y el nombre del modelo --

        ** Método por Slug sin función en el Modelo **
        public function show($slug) { ...
            $cliente = Cliente::where('slug','=', $slug)->firstOrFail();
        -- Al implementar un atributo slug para poder ocultar los parámetros de la URL, tendremos
            que actualizar la funcion show() para la busqueda de un registro. en esta forma es
            necesario instanciar en una variable el contenido del slug y con el metedo where del
            propio modelo realizar la busqueda, ademas se emplea una funcion llamada firstOrFail()
            la cual sirve para intentar encontra el modelo al primer intento.
        --

        ** Método por Slug con función en el modelo **
        public function show(Cliente $cliente) { ...
        -- En esta ocación no es necesario crear una instancia dentro de la función tal cual, dado
            que la función recibirá una instancia del modelo como tal.
        */

        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        /* Al obtener el modelo al que se desea editar por medio de Implicit Binding en los parámetros
            de la función, y por medio de la función fill() que actualiza los datos de una variable
            la cual es la que se esta instanciando, se podra editar los mismos, con ello solo basta
            apliar un save() para que dicho registro sea almacenado en la base de datos */

        /* ** En caso de querer actualizar todos los atributos del modelo, se realiza un fill con
            request->all() **
            $cliente->fill($request->all());

            ** En caso de querer omitir algun campo para la actualización, se utiliza un exceot()
            para el request()
        */
        $cliente->fill($request->except('avatar'));
        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $name_file = time().$file->getClientOriginalName();
            $cliente->avatar = $name_file; // Actualizanción del nombre del avatar
            $file->move(public_path().'/images/', $name_file);
        }
        else{
            $name_file = 'default_avatar.png';
        }
        $cliente->save();
        return 'update';
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
