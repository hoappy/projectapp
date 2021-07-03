<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dependencia;
use Illuminate\Http\Request;

class DependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dependencias = Dependencia::all();

        return view('admin.dependencia.index', compact('dependencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dependencia.create');
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
            'nombre_dependencia' => ['required', 'string', 'max:255'],
            'direccion_dependencia' => ['required', 'string', 'max:255'],        
        ]);

        Dependencia::create($request->all());

        //$automovils = Automovil::all();

        return redirect()->route('admin.dependencias.index'/*, $automovils*/)->with('info', 'La dependencia se creo correctamente');

        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    return view('admin.dependencia.show', compact('dependencias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    return view('admin.dependencia.edit'/*, compact('dependencias')*/);
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
        $request->validate([
            'nombre_dependencia' => ['required', 'string', 'max:255'],
            'direccion_dependencia' => ['required', 'string', 'max:255'],        
        ]);

        $dependencia->update($request->all());

        //$automovils = Automovil::all();

        return redirect()->route('admin.dependecias.index')->with('info', 'la dependencia se actualizo correctamente');


        //return $request->all();
    }

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

    public function desactivar(Request $request)
    {
        $automovil = Dependencia::findOrFail($request->id);
        $automovil->estado = '0';
        $automovil->save();
        
        return redirect()->route('admin.dependencias.index')->with('info', 'La dependencia se desactivo correctamente');
    }

    public function activar(Request $request)
    {
        $automovil = Dependencia::findOrFail($request->id);
        $automovil->estado = '1';
        $automovil->save();
        
        return redirect()->route('admin.dependecias.index')->with('info', 'La dependencia se activo correctamente');
    }
}
