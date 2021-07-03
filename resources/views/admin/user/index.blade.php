@extends('adminlte::page')

@section('title', 'Listado Usuarios')

@section('content_header')
    <h1>Listado Usuarios</h1><a class="btn btn-primary" href="{{route('admin.users.create')}}">Agregar Usuario</a>
@stop

@section('content')
    @livewireStyles
    @livewireScripts
    @livewire('admin.users-index')
@stop
