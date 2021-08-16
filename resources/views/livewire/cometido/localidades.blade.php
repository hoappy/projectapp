<div>
    <div class="card">
        <div class="form-group">
            <div class="form-group now">
                <label for="region" class="col-md-6 form-label text-md-left">Region</label>
                <div class="col-md-12">
                    <select name="region" class="form-control" wire:change='listarprovincias($event.target.value)'>
                        <option value="">Seleccione Region...</option>
                        @foreach ($regiones as $region)
                        <option value="{{ $region->id }}">{{$region->nombre_region}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @if ($provincias)
            <div class="form-group now">
                <label for="provincia" class="col-md-6 form-label text-md-left">Provincia</label>
                <div class="col-md-12">
                    <select name="region" class="form-control" wire:change='listarciudades($event.target.value)'>
                        <option value="">Seleccione Provincia...</option>
                        @foreach ($provincias as $provincia)
                        <option value="{{ $provincia->id }}">{{$provincia->nombre_provincia}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif

            {!! Form::open(['route' => 'admin.ciudad_cometidos.store']) !!}
            @if ($ciudades)
            <div class="form-group">
                <div class="col-md-12">
                    {!! form::label('ciudad_id', 'Ciudad') !!}
                    {!! form::select('ciudad_id', $ciudades, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Ciudad ']) !!}
                </div>
                @error('id')
                <span class="text-danger">{{$message}}</span>
                @enderror

            </div>
            <div class="form-group">
                <div class="col-md-12">
                    {!! form::label('cometido_id', 'id del cometido') !!}
                    {!! form::number('cometido_id', $cometido->id, ['class' => 'form-control', 'placeholder' => '', 'readonly']) !!}
                </div>
                @error('item_presipuestario_id')
                <span class="text-danger">{{$message}}</span>
                @enderror

            </div>
            @endif

            {!! Form::submit('Siguiente (Agregar Localidad)', ['class' => 'btn btn-primary', 'name' => 'submitbutton']) !!}
            {!! Form::submit('Finalizar', ['class' => 'btn btn-success', 'name' => 'submitbutton']) !!}

            {!! Form::close() !!}
        </div>
    </div>
</div>