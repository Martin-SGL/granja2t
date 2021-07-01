<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\VentaController;
use App\Http\Controllers\Admin\EstanqueController;


Route::get('clientes', [ClienteController::class, 'index'])->name('admin.clientes.index');
Route::get('estanques', [EstanqueController::class, 'index'])->name('admin.estanques.index');
Route::resource('ventas', VentaController::class)->names('admin.ventas');