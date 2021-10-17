<div x-data="{open_destroy: @entangle('open_destroy')}" @keyup.espace="alert('hola')" class="text-sm">
    <div class="bg-white shadow-md rounded p-2 flex justify-between">
        <div class="mt-2">
            Total de nominas: <span class="font-bold">$ {{number_format($total_nominas, 2)}} </span>
        </div>
        <div>
            <label class="font-bold mr-2" for="">Semana para realizar pago: </label>
            <input wire:model="semana" type="week" class="input_text">
            <a wire:click="crear('{{ $semana }}')"><button title="Registrar pago" class="btn_add"><i class="fas fa-plus-circle"></i></button></a>
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
                @php  $i = 1 + $page * $pag - $pag; @endphp
                @foreach ($nominas as $nomina)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 capitalize">
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                {{ $i }}
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                @php
                                    $fecha_ini = date('d/m/Y', strtotime($nomina->semana));
                                    $fecha_fin = date('d/m/Y', strtotime($nomina->semana . '+ 6 days'));
                                    echo '<span class="font-normal">[' . $fecha_ini . ']</span>-<span class="font-normal">[' . $fecha_fin . ']</span>';
                                @endphp
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                ${{ $nomina->total }}
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                {{ $nomina->empleados->count() }}
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
                    @php $i++; @endphp
                @endforeach
            </tbody>
        </table>
        @if ($nominas->hasPages())
            <div class="px-3 py-3 bg-gray-300">
                {{ $nominas->links() }}
            </div>
        @endif

    </div>
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

    {{-- -Modal Eliminar --}}
    <div x-cloak x-show="open_destroy" x-on: x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div @click.away="open_destroy=false" class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Heroicon name: outline/exclamation -->
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                ¿Esta seguro de eliminar la nomina con fecha?
                                <span class="font-bold">
                                    @php
                                        $fecha_ini = date('d/m/Y', strtotime($nomina_eliminar->semana));
                                        $fecha_fin = date('d/m/Y', strtotime( $nomina_eliminar->semana . '+ 6 days'));
                                        echo '<span class="font-normal">[' . $fecha_ini . ']</span>-<span class="font-normal">[' . $fecha_fin . ']</span>';
                                    @endphp

                                </span>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class=" bg-gray-100 px-4 py-3 sm:px-6 flex flex-row-reverse">
                    <button @click="open_destroy=false" type="button" class="btn_close">
                        Cancelar
                    </button>
                    <button wire:click="confirm_destroy()" @click="open_destroy=false" type="submit"
                        class="btn_delete">
                        Continuar
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
