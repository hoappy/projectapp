<?php

use App\Http\Controllers\Admin\automovilController;
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

Route::resource('automovils', automovilController::class)->names('admin.automovils');

Route::resource('conductors', ConductorController::class)->names('admin.conductors');

Route::resource('dependencias', DependenciaController::class)->names('admin.dependencias');

Route::resource('cometidos', CometidoController::class)->names('admin.cometidos');

Route::resource('ciudad_cometidos', Ciudad_cometidoController::class)->names('admin.ciudad_cometidos');

Route::resource('item_presupuestarios', Item_presupuestarioController::class)->names('admin.item_presupuestarios');

/*Route::get('users', [UserController::class, 'index'])->name('admin.index');*/


