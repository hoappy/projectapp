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

Route::resource('cometidos', CometidoController::class)->names('admin.cometidos');

Route::resource('ciudad_cometidos', Ciudad_cometidoController::class)->names('admin.ciudad_cometidos');

Route::resource('item_presupuestarios', Item_presupuestarioController::class)->names('admin.item_presupuestarios');

/*Route::get('users', [UserController::class, 'index'])->name('admin.index');*/


