@extends('Layouts.app')

@section('title', 'Clientes')

@section('item_nav')
    <a href="/cliente/create" class="navbar-brand">Nuevo cliente</a>
@endsection

@section('content')
    @include('Common.success')
    <div class="row">
        {{--
        Dentro del foreach() se puede obtener y manipular la informacion contenida en un arreglo,
        en este caso será la información perteneciente a los clientes que se encuentre en la
        base de datos.
        --}}
        @foreach($clientes as $cliente)
            <div class="col-sm">
                <div class="card text-center" style="width: 18rem; margin-top: 50px">
                    <img style="height: 100px; width: 100px; background-color: #EFEFEF; margin:20px;"
                         class="card-img-top rounded-circle mx-auto d-block" src="images/{{$cliente->avatar}}" alt="">
                    <div class="card-body">
                        <h5 class="card-title"> {{$cliente->nombre}} </h5>
                        <p class="card-text"> Domicilio: {{$cliente->domicilio}} </p>
                        <a href="/cliente/{{$cliente->slug}}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
