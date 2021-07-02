@extends('adminlte::page')

@section('title', 'Listado Usuarios')

@section('content_header')
    <h1>Listado Usuarios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary btn-sm" href="{{route('admin.users.create')}}">Agregar Usuario</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="text-center">
                <tr>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Email</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Grado</th>
                    <th scope="col">Cargo</th>
                    
                    <!--<th scope="col">Detalles</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>-->
                    
                </tr>
                </thead>
                <!-- <tbody class="text-center">
                    @foreach ($users as $user)      
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->apellido_p}}</td>
                    <td>{{$user->apellido_M}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->direccion}}</td>
                    <td>{{$user->grado}}</td>
                    <td>{{$user->nombre_cargo}}</td>

                    <td width="10px"> 
                        <a class="btn btn-primary btn-sm" href="{{route('admin.users.show', $user)}}">Detalles</a>
                    </td>
                    <td width="10px">
                        <a class="btn btn-success btn-sm" href="{{route('admin.users.edit', $user)}}">Editar</a>
                    </td>
                    <td width="10px">
                        <form href="{{route('admin.users.destroy', $user)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button tupe="submit" class="btn btn-danger btn-sm" >Eliminar</button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
                 
                
                </tbody>-->
            </table>
        </div>
    </div>
    
@stop
