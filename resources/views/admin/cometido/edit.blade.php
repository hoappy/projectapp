@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>Portal Administrador</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Bienvenido</h1>
        </div>
        <div class="card-body">
            <p>Este es el panel de administracion donde podra gestionar todos los ambitos del sistema de cometidos</p>
        </div>
    </div>
    
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop