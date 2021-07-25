<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dependencia;
use Illuminate\Http\Request;

use App\Models\User;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

use Spatie\Permission\Models\Role;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('can:admin.user.index')->only('index');
        $this->middleware('can:admin.user.edit')->only('edit');
        $this->middleware('can:admin.user.create')->only('create');
        $this->middleware('can:admin.user.destroy')->only('destroy');
        $this->middleware('can:admin.user.activar')->only('activar');
        $this->middleware('can:admin.user.desactivar')->only('desactivar');
        //$this->middleware('can:admin.user.rolestore')->only('rolestore');
        //$this->middleware('can:admin.user.roleasig')->only('roleasig');

    }

    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dependencias = Dependencia::pluck('nombre_dependencia', 'id');

        return view('admin.user.create', compact('dependencias'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'rut' => ['required', 'string', 'max:255'],

            'apellido_P' => ['required', 'string', 'max:255'],
            'apellido_M' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'date'],
            'grado' => ['required', 'string', 'max:255'],
            'nombre_cargo' => ['required', 'string', 'max:255'],
            'dependencia_id' => ['required', 'integer'],

            'password' => $this->passwordRules(),
            //'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ]);
        
        User::create([
            'name' =>$request->name,
            'rut' =>$request->rut,
            'email' => $request->email,
            'apellido_P' => $request->apellido_P,
            'apellido_M' => $request->apellido_M,
            'direccion' => $request->direccion,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'grado' => $request->grado,
            'nombre_cargo' => $request->nombre_cargo,
            'dependencia_id' => $request->dependencia_id,

            'password' => Hash::make($request->password),
        ]);
        

        return redirect()->route('admin.users.index'/*, $automovils*/)->with('info', 'El usuario se creo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    return view('admin.user.show'/*, compact('users')*/);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $dependencias = Dependencia::pluck('nombre_dependencia', 'id');

        return view('admin.user.edit', compact('user', 'dependencias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:users,email,$user->id"],

            'rut' => ['required', 'string', 'max:255'],

            'apellido_P' => ['required', 'string', 'max:255'],
            'apellido_M' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'date'],
            'grado' => ['required', 'string', 'max:255'],
            'nombre_cargo' => ['required', 'string', 'max:255'],
            'dependencia_id' => ['required', 'integer'],

            //'password' => $this->passwordRules(),
            //'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ]);
        
        $user->update($request->all());
        

        return redirect()->route('admin.users.index'/*, $automovils*/)->with('info', 'El usuario se creo correctamente');
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
    public function roleasig(User $user)
    {
        $roles = Role::all();

        return view('admin.user.role', compact('user', 'roles'));
    }

    public function rolestore(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        

        return redirect()->route('admin.users.roleasig', $user)->with('info', 'Se asigno el rol correctamente');
    }
    
}
