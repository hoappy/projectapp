<div>
    <div class="card">
            <div class="card-header">
                <input wire:model="search" type="text" class="form-control" placeholder="Ingrese objetivo del cometido">
            </div>
            @if($cometidos->count())
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="text-center">
                        <tr>
                            
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha Inicio</th>
                            <th scope="col">Fecha Termino</th>
                            <th scope="col">Objetivo</th>
                            <th scope="col">Detalles</th>
                            <th scope="col">Cancelar</th>
                            
                        </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($cometidos as $cometido)      
                        <tr>
                            <td>{{$cometido->progreso}}</td>
                            <td>{{$cometido->fecha_inicio}}</td>
                            <td>{{$cometido->fecha_termino}}</td>
                            <td>{{$cometido->objetivo}}</td>
                           
                            <td width="10px">
                                <a class="btn btn-secondary btn-sm" href="{{route('admin.cometidos.show', $cometido)}}">Detalles</a>
                            </td>
                            @if ($cometido->estado === '0')
                                <td >
                                    <form action="{{route('admin.cometidos.cancelar', $cometido)}}" method="POST">
                                        @csrf
                                        {{method_field('put')}}
                                        <button type="submit" class="btn btn-danger btn-sm" >Cancelar</button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <td>{{$cometido->progreso}}</td>
                                </td>
                            @endif
                        
                        </tr>
                        @endforeach
                        
                        
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{$cometidos->links()}}
                </div>
            @else
                <div class="card-body">
                    <strong>No hay registros</strong>
                </div>
            @endif
        </div>
    </div>
</div>
