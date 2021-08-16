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
                    <h5>{{$cometido['tipo_transporte_ida']}}</h5>
               </div>
               <div class="col-3">
                    <h5>Transporte de regreso: </h5>
                </div>
                <div class="col-3">
                    <h5>{{$cometido['tipo_transporte_regreso']}}</h5>
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
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop