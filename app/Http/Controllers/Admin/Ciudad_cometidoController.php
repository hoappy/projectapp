<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ciudad;
use App\Models\Ciudad_cometido;
use App\Models\Cometido;
use App\Models\Provincia;
use App\Models\Region;
use Illuminate\Http\Request;

class Ciudad_cometidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('admin.cometidos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cometido $cometido, Request $request)
    {

        return view('admin.cometido.localidad', compact('cometido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Cometido $cometido, Request $request)
    {
        $request->validate([
            'ciudad_id' => ['required', 'integer'],
            'cometido_id' => ['required', 'integer'],
        ]);
        
        $ciudadcometido = Ciudad_cometido::create([
            'ciudad_id' => $request['ciudad_id'],
            'cometido_id' => $request['cometido_id'],
        ]);
        if($request->submitbutton === 'Siguiente (Agregar Localidad)'){
            $cometido = Cometido::find($request->cometido_id);
            return view('admin.cometido.localidad', compact('cometido'));
        }else{
            return redirect()->route('admin.cometidos.index')->with('info', 'El Cometido se creo correctamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.ciudad_cometido.show'/*, compact('ciudad_cometidos')*/);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.ciudad_cometido.edit'/*, compact('ciudad_cometidos')*/);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
