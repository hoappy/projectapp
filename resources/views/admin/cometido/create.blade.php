@extends('adminlte::page')

@section('title', 'Crear cometido')

@section('content_header')
<h1>Crear Cometido</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">Ingrese los Campos Con los datos Requeridos</h1>
    </div>
    <div class="card-body">
        {!! Form::open(['route' => 'admin.cometidos.store']) !!}

        <div class="form-group">
            {!! form::label('fecha_inicio', 'Fecha inicio') !!}
            {!! form::date('fecha_inicio', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha de inicio']) !!}

            @error('fecha_inicio')
            <span class="text-danger">{{$message}}</span>
            @enderror

        </div>
        <div class="form-group">
            {!! form::label('fecha_termino', 'Fecha termino') !!}
            {!! form::date('fecha_termino', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha de termino']) !!}

            @error('fecha_termino')
            <span class="text-danger">{{$message}}</span>
            @enderror

        </div>

        <div class="form-group">
            {!! form::label('objetivo', 'Objetivo') !!}
            {!! form::text('objetivo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el objetivo del cometido']) !!}

            @error('objetivo')
            <span class="text-danger">{{$message}}</span>
            @enderror

        </div>
        <div class="form-group">
            {!! form::label('dias_c_pernoctar', 'Dias con pernoctar') !!}
            {!! form::number('dias_c_pernoctar', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad de dias a pernoctar']) !!}

            @error('dias_c_pernoctar')
            <span class="text-danger">{{$message}}</span>
            @enderror

        </div>
        <div class="form-group">
            {!! form::label('dias_s_pernoctar', 'Dias sin pernoctar') !!}
            {!! form::number('dias_s_pernoctar', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad de dias sin pernoctar']) !!}

            @error('dias_s_pernoctar')
            <span class="text-danger">{{$message}}</span>
            @enderror

        </div>
        <div class="form-group">
            {!! form::label('tipo_transporte_ida', 'Transporte de ida') !!}
            {!! Form::select('tipo_transporte_ida', array('1' => 'Auto', '2' => 'Camioneta',
                 '3' => 'Camion'), 'null', ['class' => 'form-control', 'placeholder' => 'Seleccione el transporte de ida ', 'readonly']); !!}

            @error('tipo_transporte_ida')
            <span class="text-danger">{{$message}}</span>
            @enderror

        </div>
        <div class="form-group">
            {!! form::label('tipo_transporte_regreso', 'Transporte de regreso') !!}
            {!! Form::select('tipo_transporte_regreso', array('1' => 'Auto', '2' => 'Camioneta',
                 '3' => 'Camion'), 'null', ['class' => 'form-control', 'placeholder' => 'Seleccione el transporte regreso ', 'readonly']); !!}

            @error('tipo_transporte_regreso')
            <span class="text-danger">{{$message}}</span>
            @enderror

        </div>
        <div class="form-group">
            {!! form::label('item_presupuestario_id', 'Item presupuestario') !!}
            {!! form::select('item_presupuestario_id', $item, null, ['class' => 'form-control', 'placeholder' => 'Seleccione el item presupuestarioa ', 'readonly']) !!}

            @error('item_presupuestario_id')
            <span class="text-danger">{{$message}}</span>
            @enderror

        </div>
        <div class="form-group">
            {!! form::label('user_jefe_id', 'Jefe') !!}
            {!! form::select('user_jefe_id', $jefe, null, ['class' => 'form-control', 'placeholder' => 'Seleccione a su Jefe ', 'readonly']) !!}

            @error('user_jefe_id')
            <span class="text-danger">{{$message}}</span>
            @enderror

        </div>

        {!! Form::submit('Siguiente (Agregar Localidad)', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
<script src="{{'/vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js'}}"></script>

<script>
    $(document).ready(function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#contrasenna',
            space: '-'
        });
    });
</script>
@stop