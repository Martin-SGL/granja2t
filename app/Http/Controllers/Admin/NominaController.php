<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NominaRequest;
use App\Models\Empleado;
use App\Models\Nomina;

class NominaController extends Controller
{
   public function index()
   {

       return view('admin.nominas.index');

   }

   public function create($semana)
   {
       $empleados = Empleado::where('estatus','2')->get();
       return view('admin.nominas.create',compact('semana','empleados'));
   }

   public function store(NominaRequest $request)
   {

        $res =  $this->getOperaciones($request);
        $total_nomina = $res['total_nomina'];
        $total = $res['total'];
        $cantidad_dias = $res['cantidad_dias'];

        $nomina = Nomina::create([
            'semana' => $request->semana,
            'fecha_ini' => date("Y-m-d", strtotime($request->semana)),
            'total'=> $total_nomina,
        ]);
        for($i=0;$i<=count($request->id)-1; $i++)
        {
            if($request->trabajo[$i]=='1'){
                $nomina->empleados()->attach($request->id[$i],[
                    'cantidad_dias' => $cantidad_dias[$i],
                    'salario_dia' => $request->salario[$i],
                    'total' => $total[$i],
                    'lun' => $request->lunes[$i],
                    'mar' => $request->martes[$i],
                    'mie' => $request->miercoles[$i],
                    'jue' => $request->jueves[$i],
                    'vie' => $request->viernes[$i],
                    'sab' => $request->sabado[$i],
                    'dom' => $request->domingo[$i],
                    'recurso' => $request->recurso[$i],
                ]);


            }
        }

        return redirect()->route('admin.nominas.index')->with('info','Nomina creada con exito');

   }


   public function edit(Nomina $nomina)
   {
       return view('admin.nominas.edit',compact('nomina'));
   }

   public function update(NominaRequest $request,Nomina $nomina)
   {
        $res =  $this->getOperaciones($request);
        $total_nomina = $res['total_nomina'];
        $total = $res['total'];
        $cantidad_dias = $res['cantidad_dias'];

        $nomina->update([
            'semana' => $request->semana,
            'fecha_ini' => date("Y-m-d", strtotime($request->semana)),
            'total'=> $total_nomina,
        ]);

        for($i=0;$i<=count($request->id)-1; $i++)
        {
            $nomina->empleados()->updateExistingPivot($request->id[$i], [
                'cantidad_dias' => $cantidad_dias[$i],
                'salario_dia' => $request->salario[$i],
                'total' => $total[$i],
                'lun' => $request->lunes[$i],
                'mar' => $request->martes[$i],
                'mie' => $request->miercoles[$i],
                'jue' => $request->jueves[$i],
                'vie' => $request->viernes[$i],
                'sab' => $request->sabado[$i],
                'dom' => $request->domingo[$i],
                'recurso' => $request->recurso[$i],
            ]);

            if($request->trabajo[$i]=='0'){
                $nomina->empleados()->detach($request->id[$i]);
            }
        }

        return redirect()->route('admin.nominas.index')->with('info','Nomina actualizada con exito');
   }

   protected function getOperaciones($request)
   {
        //obtener total
       $total = array();
       $total_nomina = 0;
       $cantidad_dias = array();
       for($i=0;$i<=count($request->lunes)-1; $i++)
       {
            $lu = $request->lunes[$i];
            $ma = $request->martes[$i];
            $mi = $request->miercoles[$i];
            $ju = $request->jueves[$i];
            $vi = $request->viernes[$i];
            $sa = $request->sabado[$i];
            $do = $request->domingo[$i];

            $salario = $request->salario[$i];
            $dias = $lu +$ma + $mi + $ju + $vi + $sa + $do;
            $t = $dias * $salario;
            array_push($total, $t);
            $total_nomina += $t;
            array_push($cantidad_dias,$dias);
       }

       return [
           'total_nomina'=>$total_nomina,
           'total'=>$total,
           'cantidad_dias'=>$cantidad_dias
       ];
   }

}
