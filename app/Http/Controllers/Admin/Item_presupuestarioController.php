<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item_presupuestario;
use Illuminate\Http\Request;

class Item_presupuestarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item_presupuestarios = Item_presupuestario::all();

        return view('admin.item_presupuestario.index', compact('item_presupuestarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.item_presupuestario.create');
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
            'nombre_item_presupuestario' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'], 
            'valor' => ['required', 'integer'],        
        ]);

        Item_presupuestario::create($request->all());

        //$automovils = Automovil::all();

        return redirect()->route('admin.item_presupuestarios.index'/*, $automovils*/)->with('info', 'La item_presupuestario se creo correctamente');

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
    return view('admin.item_presupuestario.show', compact('item_presupuestarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item_presupuestario $item_presupuestario)
    {

        return view('admin.item_presupuestario.edit', compact('item_presupuestario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item_presupuestario $item_presupuestario)
    {
        $request->validate([
            'nombre_item_presupuestario' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'], 
            'valor' => ['required', 'integer'],        
        ]);

        $item_presupuestario->update($request->all());

        return redirect()->route('admin.item_presupuestarios.index')->with('info', 'El item_presupuestario se actualizo correctamente');
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
        $item_presupuestario = Item_presupuestario::findOrFail($request->id);
        $item_presupuestario->estado = '0';
        $item_presupuestario->save();
        
        return redirect()->route('admin.item_presupuestarios.index')->with('info', 'La item_presupuestario se desactivo correctamente');
    }

    public function activar(Request $request)
    {
        $item_presupuestario = Item_presupuestario::findOrFail($request->id);
        $item_presupuestario->estado = '1';
        $item_presupuestario->save();
        
        return redirect()->route('admin.item_presupuestarios.index')->with('info', 'La item_presupuestario se activo correctamente');
    }
}
