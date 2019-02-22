@extends('Layouts.app')

@section('title', 'Editar Cliente')

@section('content')

    {{--
      En esta ocasion se emplea la construcción de un formulario por medio de Model Binding, dado que la
        operación que se va a realizar es de editar, es necesario que sea de esta manera, cuya forma seria

        {!! Form:model($<modelo>, ['route'=>['<modelo>.update', $modelo], 'method'=>'PUT/PATCH']) !!}
        ...
        ...
        {!! Form::close() !!}
    --}}

    {!! Form::model($cliente, ['route'=>['cliente.update', $cliente], 'method'=>'PUT', 'files'=>true]) !!}

        @include('cliente.form')

        {!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}


{{--


    <form class="form-group" method="POST" action="/cliente/{{$cliente->slug}}"
          enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">Nombre</label>
            --}}
{{-- El dato que se solicita en el campo Value pertenece al valor actual instanciado--}}{{--

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
--}}



    </form>

@endsection
