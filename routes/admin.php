<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('users', UserController::class)->names('admin.users');

Route::resource('automovils', UserController::class)->names('admin.automovils');

Route::resource('conductors', UserController::class)->names('admin.conductors');

Route::resource('dependencias', UserController::class)->names('admin.dependencias');

Route::resource('cometidos', UserController::class)->names('admin.cometidos');

Route::resource('ciudad_cometidos', UserController::class)->names('admin.ciudad_cometidos');

Route::resource('item_presupuestarios', UserController::class)->names('admin.item_presupuestarios');

/*Route::get('users', [UserController::class, 'index'])->name('admin.index');*/


