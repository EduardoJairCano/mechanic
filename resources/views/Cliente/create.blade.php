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
    <div class="form-group">
        <label for="">Nombre</label>
        <input type="text" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
@endsection
