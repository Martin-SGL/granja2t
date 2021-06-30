<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\VentaController;


Route::resource('clientes', ClienteController::class)->names('admin.clientes');
Route::resource('ventas', VentaController::class)->names('admin.ventas');