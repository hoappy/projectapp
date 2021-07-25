@extends('adminlte::page')

@section('title', 'Editar Item')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Ingrese los Campos Con los datos Requeridos</h1>
        </div>
        <div class="card-body">
            {!! Form::model($item_presupuestario, ['route' => ['admin.item_presupuestarios.update', $item_presupuestario], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! form::label('nombre_item_presupuestario', 'Nombre de Item Presupuestario') !!}
                    {!! form::text('nombre_item_presupuestario', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de Item Presupuestario']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('descripcion', 'Descripcion') !!}
                    {!! form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripcion de Item Presupuestario']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('valor', 'Valor') !!}
                    {!! form::number('valor', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el valor de Item Presupuestario']) !!}
                </div>
                

                {!! Form::submit('Editar Item', ['class' => 'btn btn-primary']) !!}

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