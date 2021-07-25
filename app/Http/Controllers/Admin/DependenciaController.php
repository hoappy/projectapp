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

        return redirect()->route('admin.dependencias.index')->with('info', 'La dependencia se creo correctamente');
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
    public function edit(Dependencia $dependencia)
    {

        return view('admin.dependencia.edit', compact('dependencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dependencia $dependencia)
    {
        $request->validate([
            'nombre_dependencia' => ['required', 'string', 'max:255'],
            'direccion_dependencia' => ['required', 'string', 'max:255'],        
        ]);

        $dependencia->update($request->all());

        return redirect()->route('admin.dependencias.index')->with('info', 'la dependencia se actualizo correctamente');

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
        $dependencia = Dependencia::findOrFail($request->id);
        $dependencia->estado = '0';
        $dependencia->save();
        
        return redirect()->route('admin.dependencias.index')->with('info', 'La dependencia se desactivo correctamente');
    }

    public function activar(Request $request)
    {
        $dependencia = Dependencia::findOrFail($request->id);
        $dependencia->estado = '1';
        $dependencia->save();
        
        return redirect()->route('admin.dependencias.index')->with('info', 'La dependencia se activo correctamente');
    }
}
