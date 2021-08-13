<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\cometidoAceptado;
use App\Mail\cometidoRechazado;
use App\Models\Automovil;
use App\Models\Cometido;
use App\Models\User;
use Illuminate\Http\Request;
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
        //$cometidos = Cometido::all()->where('user_solicita_id','=', auth()->user()->id );

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
        return view('admin.cometido.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cometido $cometido)
    {
        return view('admin.cometido.show'/*, compact('cometidos')*/);
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
