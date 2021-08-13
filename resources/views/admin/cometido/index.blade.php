@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{route('admin.cometidos.create')}}">Agregar Cometido</a>
    <h1>Listado de mis Cometidos</h1>
@stop

@section('content')
    @livewireStyles
        @livewireScripts
        @livewire('cometido.cometidos-index')
    @stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop