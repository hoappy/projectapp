<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\cometidoAceptado;
use App\Mail\cometidoRechazado;
use App\Models\Automovil;
use App\Models\Ciudad;
use App\Models\Cometido;
use App\Models\Item_presupuestario;
use App\Models\Provincia;
use App\Models\Region;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CometidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cometidos = Cometido::all()->where('user_solicita_id','=', auth()->user()->id );

        return view('admin.cometido.index'/*, compact('cometidos')*/);
    }

    public function jefe()
    {
        //$cometidos = Cometido::all()->where('user_jefe_id','=', auth()->user()->id );

        return view('admin.cometido.jefe'/*, compact('cometidos')*/);
    }

    public function admin()
    {
        //$cometidos = Cometido::all();

        return view('admin.cometido.admin'/*, compact('cometidos')*/);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jefe = User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->where('model_has_roles.role_id', '=', 2)
        ->get()
        ->pluck('full_name', 'id');

        $item = Item_presupuestario::all()->Where('estado', '=', '1')
        ->pluck('full_name', 'id');

        return view('admin.cometido.create', compact('item', 'jefe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_inicio' => ['required', 'date'],
            'fecha_termino' => ['required', 'date'],
            'objetivo'=> ['required', 'string', 'max:255'],
            'dias_c_pernoctar'=> ['required', 'string','max:2'],
            'dias_s_pernoctar'=> ['required', 'string','max:2'],
            'tipo_transporte_ida' => ['required', 'integer'],
            'tipo_transporte_regreso' => ['required', 'integer'],
            'item_presupuestario_id'=> ['required', 'integer'],
            'user_jefe_id'=> ['required', 'integer'],
               
        ],
        [
            'required' => 'Este campo no puede quedar Vacio',
            
        ]);
        $cometido = Cometido::create([
            'fecha_inicio' => $request['fecha_inicio'],
            'fecha_termino' => $request['fecha_termino'],

            'objetivo' => $request['objetivo'],

            'dias_c_pernoctar' => $request['dias_c_pernoctar'],
            'dias_s_pernoctar' => $request['dias_s_pernoctar'],
            'direccion' => $request['direccion'],
            'tipo_transporte_ida' => $request['tipo_transporte_ida'],
            'tipo_transporte_regreso' => $request['tipo_transporte_regreso'],
            'item_presupuestario_id' => $request['item_presupuestario_id'],
            'user_jefe_id' => $request['user_jefe_id'],
            'fecha_emicion' => Carbon::now(),

            'progreso' => 'Solicitud Ingresada',

            'user_solicita_id' => Auth::user()->id,
        ]);
        
        return view('admin.cometido.localidad', compact('cometido'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cometido $cometido)
    {
        $localidades = Ciudad::join('provincias', 'ciudads.provincia_id', '=', 'provincias.id')
        ->join('regions', 'provincias.region_id', '=', 'regions.id')
        ->join('ciudad_cometidos', 'ciudads.id', '=', 'ciudad_cometidos.ciudad_id')
        ->join('cometidos', 'cometidos.id', '=', 'ciudad_cometidos.cometido_id')
        ->where('cometidos.id', '=', $cometido->id)
        ->get();
        
        $item = Item_presupuestario::join('cometidos', 'cometidos.item_presupuestario_id', '=', 'item_presupuestarios.id')
        ->where('cometidos.id', '=', $cometido->id)
        ->get();
        
        $jefe = User::join('cometidos', 'cometidos.user_jefe_id', '=', 'users.id')
        ->where('cometidos.id', '=', $cometido->id)
        ->get();

        return view('admin.cometido.show', compact('cometido', 'localidades', 'item', 'jefe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cometido $cometido)
    {
        //return $cometido;
        return view('admin.cometido.edit'/*, compact('cometidos')*/);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cometido $cometido)
    {
        //
    }

    public function cancelar(Request $request)
    {
        $cometido = Cometido::findOrFail($request->id);
        $cometido->estado = '3';
        $cometido->progreso = 'Cancelado por el Solicitante';
        $cometido->save();

        return redirect()->route('admin.cometidos.index')->with('info', 'El Cometido se Cancelo correctamente');
    }

    public function rechazar(Request $request)
    {
        $cometido = Cometido::findOrFail($request->id);
        $cometido->estado = '3';
        $cometido->progreso = 'Rechazado por el Jefe del departamento';
        $cometido->save();

        return redirect()->route('admin.cometidos.jefe')->with('info', 'El Cometido se Rechazo correctamente');
    }

    public function autorizar(Request $request)
    {
        $cometido = Cometido::findOrFail($request->id);
        $cometido->estado = '1';
        $cometido->progreso = 'Autotizado por el Jefe del departamento';
        $cometido->save();

        return redirect()->route('admin.cometidos.jefe')->with('info', 'El Cometido se Autorizo correctamente');
    }

    public function denegar(Request $request)
    {
        $cometido = Cometido::findOrFail($request->id);
        $cometido->estado = '3';
        $cometido->progreso = 'El administrador denego por falta de disponivilidad de veiculos';
        $cometido->save();

        $user = User::find($cometido->user_solicita_id);

        $correo = new cometidoRechazado;
        Mail::to($user->email)->send($correo);
        //return "mensaje Enviado";

        return redirect()->route('admin.cometidos.admin')->with('info', 'Se denego correctamente');
    }

    public function asignar(Cometido $cometido)
    {
        //return $cometido;
        $automovil = Automovil::Where('estado', '=', '1')->Where('libre', '=', '1')->pluck('patente', 'id');

        return view('admin.cometido.selectautomovil', compact('cometido', 'automovil'));
    }

    public function selectautomovil(Request $request, $id)
    {
        //return $id;
        //return $request;
        $cometido = Cometido::findOrFail($id);
        $cometido->estado = '2';
        $cometido->automovil_id = $request->automovil_id;
        $cometido->progreso = 'El administrador asigno veiculo para el cometido';
        $cometido->save();

        $automovil = Automovil::findOrFail($request->automovil_id);
        $automovil->libre = '0';
        $automovil->save();

        $user = User::find($cometido->user_solicita_id);

        $correo = new cometidoAceptado;
        Mail::to($user->email)->send($correo);
        //return "mensaje Enviado";

        return redirect()->route('admin.cometidos.admin')->with('info', 'Veiculo se asigno correctamente');
    }

    public function liberar(Request $request)
    {
        $cometido = Cometido::findOrFail($request->id);
        $cometido->estado = '3';
        $cometido->progreso = 'Finalizado';
        $cometido->save();

        $automovil = Automovil::findOrFail($cometido->automovil_id);
        $automovil->libre = '1';
        $automovil->save();

        return view('admin.cometido.admin')->with('info', 'Veiculo se libero correctamente');
    }
}
