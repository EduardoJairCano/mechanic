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
        Formulario de Captura, para ello empleamos un metodo HTTP llamado POST, el cual sirve para almacenar datos, en
         la variable action ingresamos la ruta en la cual deseamos almacenar dichos datos
     --}}
    <form class="form-group" method="POST" action="/cliente" enctype="multipart/form-data">
        {{-- Token de autentificación --}}
        @csrf
        <div class="form-group">
            <label for="">Nombre</label>
            {{-- Se tendra que asignar dentro de los inputs el nombre de la variable a la que deseamos asignar --}}
            <input type="text" name="nombre" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Domicilio</label>
            <input type="text" name="domicilio" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Avatar</label>
            {{-- input del tipo file para la carga de un archivo --}}
            <input type="file" name="avatar">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>

@endsection
