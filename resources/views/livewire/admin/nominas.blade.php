<div class="bg-white shadow-md rounded p-2 flex justify-between">
    <div>
        <label class="font-bold mr-2" for="">Semana para realizar pago: </label>
        <input wire:model="semana" type="week" class="input_text">
    </div>
    <div>
        <a href="{{route('admin.nominas.create',compact('semana'))}}"><button title="Registrar pago" class="btn_add"><i
            class="fas fa-plus-circle"></i></button></a>
    </div>
</div>

<div class="bg-white shadow-md rounded my-6 overflow-y-auto">
    <table class="mx-auto min-w-max w-full table-auto">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                <th class="py-3 px-6 text-left">#</th>
                <th class="py-3 px-6 text-left">Fecha</th>
                <th class="py-3 px-6 text-left">Total Nomina</th>
                <th class="py-3 px-6 text-left"># Trabajadores</th>
                <th class="py-3 px-6 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">


        </tbody>
    </table>
</div>
