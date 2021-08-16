@extends('adminlte::page')

@section('title', 'Agregar Localidad')

@section('content_header')
<h1>Agregar Localidad</h1>
@stop

@section('content')
    @livewireStyles
    @livewireScripts
    @livewire('cometido.localidades', ['cometido' => $cometido])
@stop

@section('js')
<script src="{{'/vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js'}}"></script>

<script>
    $(document).ready(function() {
        $("#idd").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#id_cometido',
        });
    });
</script>
@endsection