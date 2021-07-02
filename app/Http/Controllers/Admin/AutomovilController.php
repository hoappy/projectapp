<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Automovil;
use Illuminate\Http\Request;

class automovilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $automovils = Automovil::all();

        return view('admin.automovil.index', compact('automovils'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.automovil.create');
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
            'modelo' => ['required', 'string', 'max:255'],
            'patente' => ['required', 'string', 'max:255'],
            'anno' => ['required', 'integer'],
            'tipo_automovil' => ['required', 'string', 'max:255'],
            'marca_automovil' => ['required', 'string', 'max:255'],
                       
        ]);

        Automovil::create($request->all());

        //$automovils = Automovil::all();

        return redirect()->route('admin.automovils.index'/*, $automovils*/);

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
    return view('admin.automovil.show'/*, compact('automovils')*/);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Automovil $automovil)
    {

        //$automovil = Automovil::find($id);

        return view('admin.automovil.edit', compact('automovil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Automovil $automovil)
    {
        $request->validate([
            'modelo' => ['required', 'string', 'max:255'],
            'patente' => ['required', 'string', 'max:255'],
            'anno' => ['required', 'integer'],
            'tipo_automovil' => ['required', 'string', 'max:255'],
            'marca_automovil' => ['required', 'string', 'max:255'],
                       
        ]);

        $automovil->update($request->all());

        return redirect()->route('admin.automovils.edit', $automovil);
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
}
