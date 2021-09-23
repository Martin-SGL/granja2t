<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Venta;
use App\Models\Estanque;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Http\Requests\VentaRequest;

class VentaController extends Controller
{

    public function index()
    {
        return view('admin.ventas.index');
    }

    public function create()
    {
        $estanques = Estanque::all();
        $clientes = Cliente::pluck('nombre','id');
        $fecha = Carbon::now();
        return view('admin.ventas.create', compact('estanques','clientes','fecha'));
    }

    public function store(VentaRequest $request)
    {
        $venta = Venta::create($request->all());
        return redirect()->route('admin.ventas.index')->with('info','Venta creada con exito'); 
    }

    public function edit(Venta $venta)
    {
        $estanques = Estanque::all();
        $clientes = Cliente::pluck('nombre','id');
        $fecha = Carbon::now();
        return view('admin.ventas.edit', compact('estanques','clientes','fecha','venta'));
    }

    public function update(VentaRequest $request, Venta $venta)
    {
        $venta->update($request->all());
        return redirect()->route('admin.ventas.index')->with('info','Venta actualizada con exito'); 
    }
}
