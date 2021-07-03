@extends('adminlte::page')

@section('title', 'Listado de Automoviles')

@section('content_header')
    <h1>Listado de Automoviles</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('admin.automovils.create')}}">Agregar Automovil</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="text-center">
                <tr>
                    <th scope="col">Modelo Automovil</th>
                    <th scope="col">Marca Automovil</th>
                    <th scope="col">Anno</th>
                    <th scope="col">Tipo Automovil</th>
                    <th scope="col">Patente</th>
                    
                    <!--<th scope="col">Detalles</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>-->
                    
                </tr>
                </thead>
                
                <tbody class="text-center">
                    @foreach ($automovils as $automovil)      
                <tr>

                    <td>{{$automovil->modelo}}</td>
                    <td>{{$automovil->marca_automovil}}</td>
                    <td>{{$automovil->anno}}</td>
                    <td>{{$automovil->tipo_automovil}}</td>
                    <td>{{$automovil->patente}}</td>
                    

                    <td width="10px"> 
                        <a class="btn btn-primary btn-sm" href="{{route('admin.automovils.show', $automovil)}}">Detalles</a>
                    </td>
                    <td width="10px">
                        <a class="btn btn-success btn-sm" href="{{route('admin.automovils.edit', $automovil)}}">Editar</a>
                    </td>
                    <td width="10px">
                        <!--<form href="{{route('admin.automovils.destroy', $automovil)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm" >Eliminar</button>
                        </form>-->
                        @if ($automovil->estado === '1')
                            <form action="{{route('admin.automovils.desactivar', $automovil)}}" method="POST">
                                @csrf
                                {{method_field('put')}}
                                <button type="submit" class="btn btn-danger btn-sm" >Desactivar</button>
                            </form>
                        @else
                            <form action="{{route('admin.automovils.activar', $automovil)}}" method="POST">
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
