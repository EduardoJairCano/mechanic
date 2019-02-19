@extends('Layouts.app')

@section('title', 'Clientes')

@section('content')

    <div class="row">
        {{--
            Dentro del foreach() se puede obtener y manipular la informacion contenida en un arreglo, en este caso será
            la información perteneciente a los clientes que se encuentre en la base de datos.
        --}}
        @foreach($clientes as $cliente)
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="images/{{$cliente->avatar}}" alt="">
                    <div class="card-body">
                        <h5 class="card-title"> {{$cliente->nombre}} </h5>
                        <p class="card-text"> Domicilio: {{$cliente->domicilio}} </p>
                        <a href="#" class="btn btn-primary">Acceder</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
