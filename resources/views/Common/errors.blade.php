{{--
    Deteeccion de errores en la validación del llenado del registro **
    Para ello se emplea una condicional que itere entre los posibles errores que se puedan encontrar, los
    cuales se almacenan en un arreglo llamado $errors, la condicional del if se declará solicitando la posible
    existencia de un error con $errors->any() y con un @foreach()  se recorre el arreglo y muestran los
    posibles errores
    --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif
