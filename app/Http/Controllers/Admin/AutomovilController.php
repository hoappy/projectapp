<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Automovil;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

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
        Validator::validate([
            'modelo' => ['required', 'string', 'max:255'],
            'patente' => ['required', 'string', 'max:255'],
            'anno' => ['required', 'integer', 'max:11'],
            'tipo_automovil' => ['required', 'string', 'max:255'],
            'marca_automovil' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'integer'],
            
        ]);

        Automovil::create($request->all());

        $automovils = Automovil::all();

        return redirect()->route('admin.automovil.index', $automovils);

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
    public function edit($id)
    {
    return view('admin.automovil.edit'/*, compact('automovils')*/);
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
    public function destroy($id)
    {
        //
    }
}