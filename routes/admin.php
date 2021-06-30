<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

Route::get('', [HomeController::class, 'index']);

Route::get('users', [HomeController::class, 'admin.userList']);


