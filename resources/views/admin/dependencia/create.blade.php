@extends('adminlte::page')

@section('title', 'Agregar Usuario')

@section('content_header')
    <h1>Agregar Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Ingrese los Campos Con los datos Requeridos</h1>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'admin.dependencias.store']) !!}

                <div class="form-group">
                    {!! form::label('nombre_dependencia', 'Nombre de dependencia') !!}
                    {!! form::text('nombre_dependencia', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de la dependencia']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('direccion_dependencia', 'Direccion de dependencia') !!}
                    {!! form::text('direccion_dependencia', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la direccion de la dependencia']) !!}
                </div>
                
                {!! Form::submit('Agregar Dependencia', ['class' => 'btn btn-primary']) !!}

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