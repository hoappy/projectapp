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
            {!! Form::open(['route' => 'admin.automovils.store']) !!}

                <div class="form-group">
                    {!! form::label('modelo', 'Modelo') !!}
                    {!! form::text('modelo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el modelo del vehiculo']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('patente', 'Patente') !!}
                    {!! form::text('patente', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la patente del vehiculo']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('anno', 'Año') !!}
                    {!! form::number('anno', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el ano del vehiculo']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('tipo_automovil', 'Tipo automovil') !!}
                    {!! form::text('tipo_automovil', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el tipo de vechiculo']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('marca_automovil', 'Marca automovil') !!}
                    {!! form::text('marca_automovil', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la marca del automovil']) !!}
                </div>

                {!! Form::submit('Agregar Automovil', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

            {{-- <x-guest-layout>
                <x-jet-authentication-card>
                    <x-slot name="logo">
                        
                    </x-slot>

                    <x-jet-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mt-4">
                                    <x-jet-label for="name" value="{{ __('Nombres') }}" />
                                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                </div>
                                <div class="mt-4">
                                    <x-jet-label for="apellido_P" value="{{ __('Apellido Paterno') }}" />
                                    <x-jet-input id="apellido_P" class="block mt-1 w-full" type="text" name="apellido_P" :value="old('apellido_P')" required autofocus autocomplete="apellido_P" />
                                </div>

                                <div class="mt-4">    
                                    <x-jet-label for="apellido_M" value="{{ __('Apellido Materno') }}" />
                                    <x-jet-input id="apellido_M" class="block mt-1 w-full" type="text" name="apellido_M" :value="old('apellido_M')" required autofocus autocomplete="apellido_M" />
                                </div>

                                <div class="mt-4">    
                                    <x-jet-label for="direccion" value="{{ __('Direccion') }}" />
                                    <x-jet-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autofocus autocomplete="direccion" />
                                </div>

                                <div class="mt-4">    
                                    <x-jet-label for="fecha_nacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                                    <x-jet-input id="fecha_nacimiento" class="block mt-1 w-full" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" required autofocus autocomplete="fecha_nacimiento" />
                                </div>

                                <div class="mt-4">    
                                    <x-jet-label for="grado" value="{{ __('Grado') }}" />
                                    <x-jet-input id="grado" class="block mt-1 w-full" type="text" name="grado" :value="old('grado')" required autofocus autocomplete="grado" />
                                </div>

                                <div class="mt-4">    
                                    <x-jet-label for="nombre_cargo" value="{{ __('Nombre del Cargo') }}" />
                                    <x-jet-input id="nombre_cargo" class="block mt-1 w-full" type="text" name="nombre_cargo" :value="old('nombre_cargo')" required autofocus autocomplete="nombre_cargo" />
                                </div>

                                <div class="mt-4">    
                                    <x-jet-label for="dependencia_id" value="{{ __('Slecciones Dependencia') }}" />
                                    <x-jet-input id="dependencia_id" class="block mt-1 w-full" type="number" name="dependencia_id" :value="old('dependencia_id')" required autofocus autocomplete="dependencia_id" />
                                </div>

                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="terms" id="terms"/>

                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                        @endif

                        <div class="flex items-center justify-end mt-4">
                            <!--a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>-->

                            <button class="btn btn-primary">
                                {{ __('Register') }}
                            <button>
                        </div>
                    </form>
                </x-jet-authentication-card>
            </x-guest-layout> --}}

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