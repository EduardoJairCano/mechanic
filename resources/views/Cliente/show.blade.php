@extends('Layouts.app')

@section('title', 'Cliente')

@section('content')

    {{-- Incluir seccion Comun Errors --}}
    @include('Common.success')

    <img style="height: 100px; width: 100px; background-color: #EFEFEF; margin:20px;"
         class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$cliente->avatar}}"
         alt="">
    <div class="text-center">
        <h5 class="card-title"> {{$cliente->nombre}} </h5>
        <p>Domicilio: {{$cliente->domicilio}} </p>
        <a href="/cliente/{{$cliente->slug}}/edit" class="btn btn-primary">Ver más</a>

       {{-- ** Formato Colective
        {!! Form::open(['route'=>['cliente.destroy', $cliente->slug], 'method'=>'DELETE']) !!}
            {!! Form::submit('Eliminar', ['class'=>'btn btn-danger']) !!}
        {!! Form::close() !!}
        --}}

        <form method="POST" action="/cliente/{{$cliente->slug}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Eliminar">
            </div>
        </form>﻿

    </div>
@endsection
