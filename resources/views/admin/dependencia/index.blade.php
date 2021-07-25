@extends('adminlte::page')

@section('title', 'Listado de Dependencias')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{route('admin.dependencias.create')}}">Agregar Dependencia</a>
    <h1>Listado de Dependencias</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif


    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead class="text-center">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Direccion</th>
                                        
                    <th scope="col">Detalles</th>
                    <th scope="col">Editar</th>
                    {{-- <th scope="col">Eliminar</th> --}}
                    
                </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($dependencias as $dependencia)      
                <tr>
                    <td>{{$dependencia->nombre_dependencia}}</td>
                    <td>{{$dependencia->direccion_dependencia}}</td>
                    
                    <td width="10px">
                        <a class="btn btn-secondary btn-sm" href="{{route('admin.dependencias.edit', $dependencia)}}">Editar</a>
                    </td>
                    <td width="10px">
                        @if ($dependencia->estado === '1' )
                            <form action="{{route('admin.dependencias.desactivar', $dependencia)}}" method="POST">
                                @csrf
                                {{method_field('put')}}
                                <button type="submit" class="btn btn-danger btn-sm" >desactivar</button>
                            </form>
                        @else
                            <form action="{{route('admin.dependencias.activar', $dependencia)}}" method="POST">
                                @csrf
                                {{method_field('put')}}
                                <button type="submit" class="btn btn-success btn-sm" >Activar</button>
                            </form>   
                        @endif 
                    </td>
                    
                </tr>
                @endforeach
                
                
                </tbody>
            </table>
        </div>
    </div>
    
@stop
