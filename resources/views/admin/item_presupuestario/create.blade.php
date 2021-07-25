@extends('adminlte::page')

@section('title', 'Agregar Item Presupuestario')

@section('content_header')
    <h1>Agregar Item Presupuestario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Ingrese los Campos Con los datos Requeridos</h1>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'admin.item_presupuestarios.store']) !!}

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
                

                {!! Form::submit('Agregar Item', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>
    </div>
    
@stop

@section('js')
    <script src="{{'/vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js'}}"></script>

    <script>
        $(document).ready( function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#contrasenna',
            space: '-'
  });
});
    </script>
@endsection