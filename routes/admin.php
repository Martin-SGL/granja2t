<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\VentaController;
use App\Http\Controllers\Admin\EstanqueController;
use App\Http\Controllers\Admin\MermaController;


Route::get('clientes', [ClienteController::class, 'index'])->name('admin.clientes.index');
Route::get('estanques', [EstanqueController::class, 'index'])->name('admin.estanques.index');
Route::get('mermas', [MermaController::class, 'index'])->name('admin.mermas.index');
Route::resource('ventas', VentaController::class)->names('admin.ventas');