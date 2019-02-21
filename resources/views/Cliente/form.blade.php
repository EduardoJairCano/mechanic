{{--Creación de una sub-views (plantilla) para los formularios--}}

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
