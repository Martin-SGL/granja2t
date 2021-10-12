<div>
   <div class="w-full p-3 rounded shadow">
    <select wire:model="month_search" class="input_text w-full">
        <option value="">Todos los meses</option>
        <option value="1">Enero</option>
        <option value="2">Febrero</option>
        <option value="3">Marzo</option>
        <option value="4">Abril</option>
        <option value="5">Mayo</option>
        <option value="6">Junio</option>
        <option value="7">Julio</option>
        <option value="8">Agosto</option>
        <option value="9">Septiembre</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
    </select>
   </div>
   <div class="w-full flex items-center p-3 rounded shadow mt-5 text-2xl lg:text-4xl {{($total_utilidad<0?"text-red-600":'')}}">
       <div class="p-3 w-24 text-center">
            <i class="fas fa-hand-holding-usd"></i>
       </div>
        <div class="w-full p-3">
            Utilidad
        </div>
        <div class="w-24">
            =
        </div>
        <div class="w-96">
            $ {{number_format($total_utilidad,2)}}
        </div>
   </div>

   <div class="w-full flex items-center p-3 rounded shadow mt-5 bg-green-500 text-white text-2xl lg:text-4xl">
        <div class="p-3 w-24 text-center">
            <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="w-full p-3">
            Ventas
        </div>
        <div class="w-24">
            +
        </div>
        <div class="w-96">
            $ {{number_format($venta_total, 2)}}
        </div>
   </div>

   <div class="w-full flex items-center p-3 rounded shadow mt-5 bg-red-500 text-white text-2xl lg:text-4xl">
        <div class="p-3 w-24 text-center">
            <i class="fas fa-money-check-alt"></i>
        </div>
        <div class="w-full p-3">
            Nomina
        </div>
        <div class="w-24">
            -
        </div>
        <div class="w-96">
            $ {{number_format($nomina_total, 2)}}
        </div>
   </div>

   <div class="w-full flex items-center p-3 rounded shadow mt-5 bg-red-500 text-white text-2xl lg:text-4xl">
        <div class="p-3 w-24 text-center">
            <i class="fas fa-funnel-dollar"></i>
        </div>
        <div class="w-full p-3">
            Gastos
        </div>
        <div class="w-24">
            -
        </div>
        <div class="w-96">
            $ {{number_format($gasto_total, 2)}}
        </div>
   </div>

</div>
