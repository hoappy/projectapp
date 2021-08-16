@extends('adminlte::page')

@section('title', 'Listado Usuarios')

@section('content_header')
    @can('admin.user.index')
        <a class="btn btn-secondary float-right" href="{{route('admin.item_presupuestarios.create')}}">Agregar Item Presupuestario</a>
    @endcan
    <h1>Listado Item Presupuestario</h1>
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
                    <th scope="col">Descripcion</th>
                    <th scope="col">Valor</th>

                    <th scope="col">Editar</th>
                    <th scope="col">Desactivar</th>
                </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($item_presupuestarios as $item_presupuestario)      
                <tr>
                    <td>{{$item_presupuestario->nombre_item_presupuestario}}</td>
                    <td>{{$item_presupuestario->descripcion}}</td>
                    <td>{{$item_presupuestario->valor}}</td>

                    <td width="10px">
                        <a class="btn btn-secondary btn-sm" href="{{route('admin.item_presupuestarios.edit', $item_presupuestario)}}">Editar</a>
                    </td>

                    <td width="10px">
                        @if ($item_presupuestario->estado === '1' )
                            <form action="{{route('admin.item_presupuestarios.desactivar', $item_presupuestario)}}" method="POST">
                                @csrf
                                {{method_field('put')}}
                                <button type="submit" class="btn btn-danger btn-sm" >desactivar</button>
                            </form>
                        @else
                            <form action="{{route('admin.item_presupuestarios.activar', $item_presupuestario)}}" method="POST">
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
