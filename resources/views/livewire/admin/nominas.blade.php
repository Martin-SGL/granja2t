<div>
    <div class="bg-white shadow-md rounded p-2 flex justify-between">
        <div>
            <label class="font-bold mr-2" for="">Semana para realizar pago: </label>
            <input wire:model="semana" type="week" class="input_text">
        </div>
        <div>
            <a wire:click="crear('{{$semana}}')"><button title="Registrar pago" class="btn_add"><i
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
                @php $i=1; @endphp
                @foreach ($nominas as $nomina)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 capitalize">
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                {{$i}}
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                @php
                                    $fecha_ini = date('d/m/Y', strtotime($nomina->semana));
                                    $fecha_fin = date('d/m/Y', strtotime($nomina->semana. '+ 6 days'));
                                    echo '<span class="font-normal">['.$fecha_ini.']</span>-<span class="font-normal">['.$fecha_fin.']</span>';
                                @endphp
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                ${{$nomina->total}}
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                {{$nomina->empleados->count()}}
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <div class="flex items-center">
                                    <a href="{{ route('admin.nominas.edit', $nomina) }}"><button title="Editar nomina"
                                            class="btn_edit"><i class="fas fa-edit"></i></button></a>
                                    <button wire:click="destroy({{ $nomina }})" title="Eliminar nomina"
                                        class="btn_delete"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <x-jet-dialog-modal wire:model="open">
            <x-slot name="title">
                <div class="border-b-2">
                    Mensaje del Sistema
                </div>
            </x-slot>
            <x-slot name="content">
                <h3>La semana a capturar ya existe</h3>
            </x-slot>
            <x-slot name="footer">
                <button class="btn_close" wire:click="$set('open')">Cerrar</button>
            </x-slot>
        </x-jet-dialog-modal>

    </div>

</div>
