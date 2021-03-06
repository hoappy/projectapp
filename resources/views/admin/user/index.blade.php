@extends('adminlte::page')

@section('title', 'Listado Usuarios')

@section('content_header')
    @can('admin.user.index')
        <a class="btn btn-secondary float-right" href="{{route('admin.users.create')}}">Agregar Usuario</a>
    @endcan
    <h1>Listado Usuarios</h1>
@stop

@section('content')


    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif


    @livewireStyles
    @livewireScripts
    @livewire('admin.users-index')
@stop
