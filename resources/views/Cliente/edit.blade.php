@extends('Layouts.app')

@section('title', 'Editar Cliente')

@section('content')

    <form class="form-group" method="POST" action="/cliente/{{$cliente->slug}}"
          enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">Nombre</label>
            {{-- El dato que se solicita en el campo Value pertenece al valor actual instanciado--}}
            <input type="text" name="nombre" value="{{$cliente->nombre}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Domicilio</label>
            <input type="text" name="domicilio" value="{{$cliente->domicilio}}"
                   class="form-control">
        </div>

        <div class="form-group">
            <label for="">Avatar</label>
            <input type="file" name="avatar">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>

    </form>

@endsection
