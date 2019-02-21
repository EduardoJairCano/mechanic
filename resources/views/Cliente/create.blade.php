{{--
    Para poder utilizar alguna plantilla previemente creada(heredar desde un layout), y solamente realizar render a
    ciertas partes del codigo, para heredar cierto codigo, se emplea la directiva @extends, la cual recibe como parámetros
    el nombre de la dirección:              @<directiva>('<direccion>')
--}}
@extends('Layouts.app')

{{--
    Al utilizar plantillas, y querer agregar contenido en las directivas @field, basta con implementarlas de la siguiente
    forma:      @section('<Nombre del campo>', '<Contenido deseado>')
--}}
@section('title', 'Crear Cliente')

{{--
    Tambien es posible crear sections en el cual su contenido sea un formto específico de HTML
--}}
@section('content')
    {{--
        *** Formularios de Colective ***
        Para la implementación de los formularios propios de Colective tendremos que implementar la siguiente
        formula:
        {!! Form:open(['route'=>'<ruta o modelo.metodo>',   // Ruta a la que se accederá
                       'method'=>'<metodo_HTTP>',           // Método por el cual se enviará la información
                       'files'=><true o false> ]) !!}       // Aceptar o no Archivos dentro del formulario

        Ya solo es cuestión de cerrar dicho formulario
        {!! Form::close() !!}

        Al incorporar este tipo de formularios, no será necesario implementar un token @csrf
    --}}
    {!! Form::open(['route'=>'cliente.store', 'method'=>'POST', 'files'=>true]) !!}

        <div class="form-group">
            {{-- Sub-formulario para un Label, el cual recibe el nombre del campo y el valor del mismo --}}
            {!! Form::label('nombre', 'Nombre') !!}
            {{-- Sub-formulario para un Text, y en un arreglo se transmite las clases propias --}}
            {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('domicilio', 'Domicilio') !!}
            {!! Form::text('domicilio', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('avatar', 'Avatar') !!}
            {!! Form::file('avatar') !!}
        </div>

        {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}


    {{--
        Formulario de Captura, para ello empleamos un metodo HTTP llamado POST, el cual sirve para almacenar datos, en
         la variable action ingresamos la ruta en la cual deseamos almacenar dichos datos
     --}}


    {{--

    <form class="form-group" method="POST" action="/cliente" enctype="multipart/form-data">
        --}}{{-- Token de autentificación --}}{{--
        @csrf
        <div class="form-group">
            <label for="">Nombre</label>
            --}}{{-- Se tendra que asignar dentro de los inputs el nombre de la variable a la que deseamos asignar --}}{{--
            <input type="text" name="nombre" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Domicilio</label>
            <input type="text" name="domicilio" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Avatar</label>
            --}}{{-- input del tipo file para la carga de un archivo --}}{{--
            <input type="file" name="avatar">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>

    --}}

@endsection
