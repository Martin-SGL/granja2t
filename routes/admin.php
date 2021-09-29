<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\VentaController;
use App\Http\Controllers\Admin\EstanqueController;
use App\Http\Controllers\Admin\MermaController;
use App\Http\Controllers\Admin\EmpleadoController;
use App\Http\Controllers\Admin\NominaController;


Route::get('clientes', [ClienteController::class, 'index'])->name('admin.clientes.index');
Route::get('estanques', [EstanqueController::class, 'index'])->name('admin.estanques.index');
Route::get('mermas', [MermaController::class, 'index'])->name('admin.mermas.index');
Route::get('empleados', [EmpleadoController::class, 'index'])->name('admin.empleados.index');

Route::resource('ventas',VentaController::class)->names('admin.ventas');

Route::get('nominas', [NominaController::class,'index'])->name('admin.nominas.index');
Route::get('nominas/create/{semana}', [NominaController::class,'create'])->name('admin.nominas.create');
Route::post('nominas/store', [NominaController::class,'store'])->name('admin.nominas.store');
