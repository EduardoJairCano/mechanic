@extends('Layouts.app')

@section('title', 'Cliente')

@section('content')
    <img style="height: 100px; width: 100px; background-color: #EFEFEF; margin:20px;"
         class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$cliente->avatar}}"
         alt="">
    <div class="text-center">
        <h5 class="card-title"> {{$cliente->nombre}} </h5>
        <p>Domicilio: {{$cliente->domicilio}} </p>
        <a href="/cliente/{{$cliente->slug}}/edit" class="btn btn-primary">Ver más</a>
    </div>
@endsection
