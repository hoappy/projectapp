@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{route('admin.cometidos.create')}}">Agregar Cometido</a>
    <h1>Listado Cometidos Subordinados</h1>
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop