<?php

use App\Http\Controllers\Admin\AutomovilController;
use App\Http\Controllers\Admin\Ciudad_cometidoController;
use App\Http\Controllers\Admin\CometidoController;
use App\Http\Controllers\Admin\ConductorController;
use App\Http\Controllers\Admin\DependenciaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Item_presupuestarioController;
use App\Http\Controllers\Admin\UserController;

use App\Mail\cometidoAceptado;
use App\Mail\cometidoRechazado;
use App\Models\Ciudad;
use App\Models\Ciudad_cometido;
use App\Models\Provincia;
use Illuminate\Support\Facades\Mail;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

//Route::resource('users', UserController::class)->middleware('can:admin.user.index')->names('admin.users');
//Route::resource('users', UserController::class)->except('show')->names('admin.users');
Route::resource('users', UserController::class)->names('admin.users');
Route::put('users/{id}/desactivar', [UserController::class, 'desactivar'])->name('admin.users.desactivar');
Route::put('users/{id}/activar', [UserController::class, 'activar'])->name('admin.users.activar');

Route::post('users/{id}/rolecreate', [UserController::class, 'rolecreate'])->name('admin.users.rolecreate');
Route::put('users/{id}/roleupdate', [UserController::class, 'role'])->name('admin.users.roleupdate');

Route::get('users/{user}/roleasig', [UserController::class, 'roleasig'])->name('admin.users.roleasig');
Route::put('users/{user}/rolestore', [UserController::class, 'rolestore'])->name('admin.users.rolestore');

Route::resource('automovils', AutomovilController::class)->names('admin.automovils');
Route::put('automovils/{id}/desactivar', [AutomovilController::class, 'desactivar'])->name('admin.automovils.desactivar');
Route::put('automovils/{id}/activar', [AutomovilController::class, 'activar'])->name('admin.automovils.activar');

Route::resource('conductors', ConductorController::class)->names('admin.conductors');
Route::put('conductors/{id}/desactivar', [ConductorController::class, 'desactivar'])->name('admin.conductors.desactivar');
Route::put('conductors/{id}/activar', [ConductorController::class, 'activar'])->name('admin.conductors.activar');

Route::resource('dependencias', DependenciaController::class)->names('admin.dependencias');
Route::put('dependencias/{id}/desactivar', [DependenciaController::class, 'desactivar'])->name('admin.dependencias.desactivar');
Route::put('dependencias/{id}/activar', [DependenciaController::class, 'activar'])->name('admin.dependencias.activar');

Route::resource('ciudad_cometidos', Ciudad_cometidoController::class)->names('admin.ciudad_cometidos');

Route::resource('item_presupuestarios', Item_presupuestarioController::class)->names('admin.item_presupuestarios');
Route::put('item_presupuestarios/{id}/desactivar', [Item_presupuestarioController::class, 'desactivar'])->name('admin.item_presupuestarios.desactivar');
Route::put('item_presupuestarios/{id}/activar', [Item_presupuestarioController::class, 'activar'])->name('admin.item_presupuestarios.activar');

Route::resource('cometidos', CometidoController::class)->names('admin.cometidos');
//los 3 usuarios
Route::put('cometidos/{id}/cancelar', [cometidoController::class, 'cancelar'])->name('admin.cometidos.cancelar');
//el jefe
Route::put('cometidos/{id}/autorizar', [cometidoController::class, 'autorizar'])->name('admin.cometidos.autorizar');
Route::put('cometidos/{id}/rechazar', [cometidoController::class, 'rechazar'])->name('admin.cometidos.rechazar');
Route::get('cometidos/jefe/index', [cometidoController::class, 'jefe'])->name('admin.cometidos.jefe');
Route::get('cometidos/admin/index', [cometidoController::class, 'admin'])->name('admin.cometidos.admin');
//el admin
Route::put('cometidos/{cometido}/asignar', [cometidoController::class, 'asignar'])->name('admin.cometidos.asignar');
Route::put('cometidos/{id}/denegar', [cometidoController::class, 'denegar'])->name('admin.cometidos.denegar');
Route::put('cometidos/{id}/selectautomovil', [cometidoController::class, 'selectautomovil'])->name('admin.cometidos.selectautomovil');
Route::put('cometidos/{id}/liberar', [cometidoController::class, 'liberar'])->name('admin.cometidos.liberar');
Route::get('cometidos/admin/index', [cometidoController::class, 'admin'])->name('admin.cometidos.admin');

// agregar localidad a cometido
Route::resource('ciudad_cometidos', Ciudad_cometidoController::class)->names('admin.ciudad_cometidos');

/*Route::get('users', [UserController::class, 'index'])->name('admin.index');*/

// prueba envio de correos
Route::get('aceptado', function(){ 
    $correo = new cometidoAceptado;
    Mail::to('hoappy.py@gmail.com')->send($correo);
    return "mensaje Enviado";
});
Route::get('rechazado', function(){
    $correo = new cometidoRechazado;
    Mail::to('hoappy.py@gmail.com')->send($correo);
    return "mensaje Enviado";
 });

 //get ciudades y provincias

 Route::get('/getciudades', function($id) {
    dd(Ciudad::all()->Where('provincia_id', '=', $id)->pluck('nombre_ciudad', 'id'));
 });

 Route::get('/getprovincias', function($id) {
    dd(Provincia::all()->Where('region_id', '=', $id)->pluck('nombre_provincia', 'id'));
 });