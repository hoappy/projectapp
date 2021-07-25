@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Ingrese los Campos Con los datos Requeridos</h1>
        </div>
        <div class="card-body">
            {!! Form::model($dependencia, ['route' => ['admin.dependencias.update', $dependencia], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! form::label('nombre_dependencia', 'Nombre de dependencia') !!}
                    {!! form::text('nombre_dependencia', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de la dependencia']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('direccion_dependencia', 'Direccion de dependencia') !!}
                    {!! form::text('direccion_dependencia', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la direccion de la dependencia']) !!}
                </div>
                

                {!! Form::submit('Agregar Usuario', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop