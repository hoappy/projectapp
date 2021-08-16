@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
<a class="btn btn-secondary float-right" href="{{route('admin.cometidos.index')}}">Atras</a>
<h1>Detalles de cometido</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title"></h1>
    </div>
    @if ($cometido)
    <div class="card-body">

        <div class="row">
            <div class="col-3">
                <h5>Fecha de emision: </h5>
            </div>
            <div class="col-3">
                <h5 type="date">{{$cometido['fecha_emicion']}}</h5>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-3">
                <h5>Fecha de inicio: </h5>
            </div>
            <div class="col-3">
                <h5>{{$cometido['fecha_inicio']}}</h5>
            </div>
            <div class="col-3">
                <h5>Fecha de termino: </h5>
            </div>
            <div class="col-3">
                <h5>{{$cometido['fecha_termino']}}</h5>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-3">
                <h5>Objetivo: </h5>
            </div>
            <div class="col-3">
                <h5>{{$cometido['objetivo']}}</h5>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-3">
                <h5>Dias con pernoctar: </h5>
            </div>
            <div class="col-3">
                <h5>{{$cometido['dias_c_pernoctar']}}</h5>
            </div>
            <div class="col-3">
                <h5>Dias sin pernoctar: </h5>
            </div>
            <div class="col-3">
                <h5>{{$cometido['dias_s_pernoctar']}}</h5>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-3">
                <h5>Trasporta de ida: </h5>
            </div>
            <div class="col-3">
                @if ($cometido->tipo_transporte_ida == '1')
                <h5> Auto</h5>
                @endif
                @if ($cometido->tipo_transporte_ida == '2')
                <h5> Camioneta</h5>
                @endif
                @if ($cometido->tipo_transporte_ida == '3')
                <h5> Camion</h5>
                @endif
            </div>
            <div class="col-3">
                <h5>Transporte de regreso: </h5>
            </div>
            <div class="col-3">
                @if ($cometido->tipo_transporte_regreso == '1')
                <h5> Auto</h5>
                @endif
                @if ($cometido->tipo_transporte_regreso == '2')
                <h5> Camioneta</h5>
                @endif
                @if ($cometido->tipo_transporte_regreso == '3')
                <h5> Camion</h5>
                @endif
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-3">
                <h5>Progreso: </h5>
            </div>
            <div class="col-3">
                <h5>{{$cometido['progreso']}}</h5>
            </div>
            <div class="col-3">
                <h5>Item presupuestario: </h5>
            </div>
            <div class="col-3">
                @foreach ($item as $item)
                <h5>{{$item->nombre_item_presupuestario}}</h5>
                @endforeach
            </div>
        </div>
        <br>

    </div>
    @endif
    <div class="card">
        @if($localidades)
        <div class="card-body">
            <h1>Detalles localidades visitadas</h1>
            <table class="table table-striped">
                <thead class="text-center">
                    <tr>
                        <th scope="col">Region</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Ciudad</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($localidades as $localidad)
                    <tr>
                        <td>{{$localidad->nombre_region}}</td>
                        <td>{{$localidad->nombre_provincia}}</td>
                        <td>{{$localidad->nombre_ciudad}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @endif
        <div class="card">
            @if($jefe)
            <div class="card-body">
                <h1>Detalles del jefe</h1>
                <table class="table table-striped">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Rut</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellido Paterno</th>
                            <th scope="col">Apellido Materno</th>
                            <th scope="col">Email</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Grado</th>
                            <th scope="col">Cargo</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($jefe as $jefe)
                        <tr>
                            <td>{{$jefe->rut}}</td>
                            <td>{{$jefe->name}}</td>
                            <td>{{$jefe->apellido_P}}</td>
                            <td>{{$jefe->apellido_M}}</td>
                            <td>{{$jefe->email}}</td>
                            <td>{{$jefe->direccion}}</td>
                            <td>{{$jefe->grado}}</td>
                            <td>{{$jefe->nombre_cargo}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>

    @stop

    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
    <script>
        console.log('Hi!');
    </script>
    @stop