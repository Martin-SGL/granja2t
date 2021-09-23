<div class="bg-white shadow-md rounded p-2 flex justify-between">
    <div>
        <label class="font-bold mr-2" for="">Semana: </label>
        <input wire:model="semana" type="week" class="input_text" >
    </div>
    <div>
        <button class="btn_add">Registrar pago</button>
    </div>
</div>

<div class="bg-white shadow-md rounded my-6 overflow-y-auto">
    <table class="mx-auto min-w-max w-full table-auto">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                <th class="py-3 px-6 text-left">#</th>
                <th class="py-3 px-6 text-left">Empleado</th>
                <th class="py-3 px-6 text-left">Salario(día)</th>
                <th class="py-3 px-6 text-left">Dias</th>
                <th class="py-3 px-6 text-left">Total</th>
                <th class="py-3 px-6 text-left">Recurso</th>
                <th class="py-3 px-6 text-left">¿Trabajó?</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @php
                $i = 0;
            @endphp
            @foreach ($empleados as $empleado)
                <tr x-data="{total:0,dias:0,salario:'{{$empleado->salario_dia}}'}" class="border-b border-gray-200 hover:bg-gray-100 capitalize">
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            {{ $i+1 }}
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            {{$empleado->nombre}}
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                           <input wire:model="salario[{{$i}}]" x-model="salario" class="input_text w-28 text-sm" type="number">
                        </div>
                        {{$salario[$i]}}
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex flex-col">
                            <label class="flex cursor-pointer" for="lunes{{$i}}"> 
                                <div class="w-16 cursor-pointer">Lunes</div>
                                <input wire:model="lun[{{$i}}]"
                                  @change="dias += ($event.target.checked) ? +$event.target.value : -$event.target.value" 
                                value="1" type="checkbox" id="lunes{{$i}}" name="dias{{$i}}" class="mr-2 input_text cursor-pointer mt-1">
                            </label>
                            <label class="flex cursor-pointer" for="martes{{$i}}">
                                <div class="w-16 cursor-pointer">Martes</div>
                                <input wire:model="mar[{{$i}}]"
                                 @change="dias += ($event.target.checked) ? +$event.target.value : -$event.target.value" 
                                value="1" type="checkbox" id="martes{{$i}}" name="dias{{$i}}" class="mr-2 input_text cursor-pointer mt-1">
                            </label>
                            <label class="flex cursor-pointer" for="miercoles{{$i}}">
                                <div class="w-16 cursor-pointer">Miercoles</div>
                                <input wire:model="mie[{{$i}}]"
                                 @change="dias += ($event.target.checked) ? +$event.target.value : -$event.target.value" 
                                value="1" type="checkbox" id="miercoles{{$i}}" name="dias{{$i}}" class="mr-2 input_text cursor-pointer mt-1">
                            </label>
                            <label class="flex cursor-pointer" for="jueves{{$i}}">
                                <div class="w-16 cursor-pointer">Jueves</div>
                                <input wire:model="jue[{{$i}}]"
                                 @change="dias += ($event.target.checked) ? +$event.target.value : -$event.target.value" 
                                value="1" type="checkbox" id="jueves{{$i}}" name="dias{{$i}}" class="mr-2 input_text cursor-pointer mt-1">
                            </label>
                            <label class="flex cursor-pointer" for="viernes{{$i}}">
                                <div class="w-16 cursor-pointer">Viernes</div>
                                <input wire:model="vie[{{$i}}]"
                                 @change="dias += ($event.target.checked) ? +$event.target.value : -$event.target.value" 
                                value="1" type="checkbox" id="viernes{{$i}}" name="dias{{$i}}" class="mr-2 input_text cursor-pointer mt-1">
                            </label>
                            <label class="flex cursor-pointer" for="sabado{{$i}}">
                                <div class="w-16 cursor-pointer">Sabado</div>
                                <input wire:model="sab[{{$i}}]"
                                 @change="dias += ($event.target.checked) ? +$event.target.value : -$event.target.value" 
                                value="1" type="checkbox" id="sabado{{$i}}" name="dias{{$i}}" class="mr-2 input_text cursor-pointer mt-1">
                            </label>
                            <label class="flex cursor-pointer" for="domingo{{$i}}">
                                <div class="w-16 cursor-pointer">Domingo</div>
                                <input wire:model="dom[{{$i}}]"
                                 @change="dias += ($event.target.checked) ? +$event.target.value : -$event.target.value" 
                                value="1" type="checkbox" id="domingo{{$i}}" name="dias{{$i}}" class="mr-2 input_text cursor-pointer mt-1">
                            </label>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                           <input x-model="dias * salario" class="bg-gray-100 input_text w-28 text-sm" type="number" readonly>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            <select class="input_text w-28 text-sm" name="">
                                <option value="0">Granja 2T</option>
                                <option value="1">VQ</option>
                            </select>
                         </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                          </label>
                    </td>
                </tr>
                @php $i++; @endphp
            @endforeach
        </tbody>
    </table>
</div>
