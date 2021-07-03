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

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="form-group">
                    {!! form::label('apellido_p', 'Apellido Paterno') !!}
                    {!! form::date('apellido_p', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido paterno del Usuario a Agregar']) !!}

                    @error('apellido_p')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>
                <div class="form-group">
                    {!! form::label('apellido_m', 'Apellido Materno') !!}
                    {!! form::number('apellido_m', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido materno del Usuario a Agregar']) !!}

                    @error('apellido_m')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="form-group">
                    {!! form::label('contrasenna', 'Contrasenna') !!}
                    {!! form::text('contrasenna', null, ['class' => 'form-control', 'placeholder' => 'Contrasenna Auto-Generada', 'readonly']) !!}

                    @error('contrasenna')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                <div class="form-group">
                    {!! form::label('dependencia_id', 'Dependencia') !!}
                    {!! form::select('dependencia_id', $dependencias, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Dependencia', 'readonly']) !!}

                    @error('dependencia_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                <div class="form-group">
                    {!! form::label('direccion', 'Direccion') !!}
                    {!! form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la direccion del Usuario a Agregar']) !!}

                    @error('direccion')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                <div class="form-group">
                    {!! form::label('fecha_nacimiento', 'Fecha de Nacimiento') !!}
                    {!! form::date('fecha_nacimiento', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Fecha de Nacimiento del Usuario a Agregar']) !!}

                    @error('fecha_nacimiento')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

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