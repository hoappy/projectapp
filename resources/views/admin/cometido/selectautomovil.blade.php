@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
<!-- <a class="btn btn-secondary float-right" href="{{route('admin.cometidos.create')}}">Agregar Cometido</a> -->
<h1>Listado Cometidos / Seleccione un Automovil</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">Seleccione un Automovil</h1>
    </div>
    <div class="card-body">
    {!! $cometido->id !!}

        {!! Form::model($cometido, ['route' => ['admin.cometidos.selectautomovil', $cometido], 'method' => 'put']) !!}

        <div class="form-group">
            {!! form::label('automovil_id', 'Automovil') !!}
            {!! form::select('automovil_id', $automovil, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Automovil ', 'readonly']) !!}

            @error('automovil_id')
            <span class="text-danger">{{$message}}</span>
            @enderror

        </div>

        {!! Form::submit('Asignar Vehiculo', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}


    </div>
</div>
@stop

@section('css')

@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop