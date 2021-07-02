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
            {!! Form::open(['route' => 'admin.users.store']) !!}

                <div class="form-group">
                    {!! form::label('name', 'Nombres') !!}
                    {!! form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el/los Nombre/s del Usuario a Agregar']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('apellido_p', 'Apellido Paterno') !!}
                    {!! form::date('apellido_p', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido paterno del Usuario a Agregar']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('apellido_m', 'Apellido Materno') !!}
                    {!! form::number('apellido_m', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido materno del Usuario a Agregar']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('contrasenna', 'Contrasenna') !!}
                    {!! form::date('contrasenna', null, ['class' => 'form-control', 'placeholder' => 'Cntrasenna Auto-Generada', 'readonly']) !!}
                </div>

                {!! Form::submit('Agregar Usuario', ['class' => 'btn btn-primary']) !!}

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