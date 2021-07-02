@extends('adminlte::page')

@section('title', 'Listado de Automoviles')

@section('content_header')
    <h1>Listado de Automoviles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary btn-sm" href="{{route('admin.automovils.create')}}">Agregar Automovil</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="text-center">
                <tr>
                    <th scope="col">Marca</th>
                    
                    
                    <!--<th scope="col">Detalles</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>-->
                    
                </tr>
                </thead>
                
                <tbody class="text-center">
                    @foreach ($automovils as $automovil)      
                <tr>
                    <td>{{$automovil->marca}}</td>
                    

                    <td width="10px"> 
                        <a class="btn btn-primary btn-sm" href="{{route('admin.automovils.show', $automovil)}}">Detalles</a>
                    </td>
                    <td width="10px">
                        <a class="btn btn-success btn-sm" href="{{route('admin.automovils.edit', $automovil)}}">Editar</a>
                    </td>
                    <td width="10px">
                        <form href="{{route('admin.automovils.destroy', $automovil)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button tupe="submit" class="btn btn-danger btn-sm" >Eliminar</button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
                
                
                </tbody>
            </table>
        </div>
    </div>
    
@stop
