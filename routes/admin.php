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

Route::resource('users', UserController::class)->names('admin.users');
Route::put('users/{id}/desactivar', [UsersController::class, 'desactivar'])->name('admin.users.desactivar');
Route::put('users/{id}/activar', [UsersController::class, 'activar'])->name('admin.users.activar');

Route::post('users/{id}/rolecreate', [UsersController::class, 'role'])->name('admin.users.rolecreate');
Route::put('users/{id}/rolestore', [UsersController::class, 'role'])->name('admin.users.rolestore');
Route::post('users/{id}/roleedit', [UsersController::class, 'roleedit'])->name('admin.users.roleedit');
Route::put('users/{id}/roleupdate', [UsersController::class, 'role'])->name('admin.users.roleupdate');


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


