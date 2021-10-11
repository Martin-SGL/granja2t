<div x-data="{open_destroy: @entangle('open_destroy')}">
    <div class="flex items-center justify-end">
        <div class="justify-start w-full">
            Total de gastos = <span class="font-bold">$ {{$total_gasto}} </span>
        </div>
        <div class="mr-5 w-72">
            Seleccione el tipo de gasto:
        </div>
        <select class="input_text w-52" wire:model="tipo_modal">
            <option value="1">Alimento</option>
            <option value="2">Energia</option>
            <option value="3">Alevines</option>
            <option value="4">Varios</option>
        </select>
        <button class="btn_add" title="Agregar gasto" wire:click="modales()" @click="$dispatch('reset')">
            <i class="fas fa-plus-circle"></i>
        </button>
    </div>

    <div class="mt-2 flex w-full">
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

        <select wire:model="gasto_search" class="input_text w-full ml-2">
            <option value="">Todos los gastos</option>
            <option value="App\Models\Alimento">Alimento</option>
            <option value="App\Models\Energia">Energia</option>
            <option value="App\Models\Alevin">Alevines</option>
            <option value="App\Models\Alimento">Varios</option>
        </select>
    </div>

    <div class="bg-white shadow-md rounded my-6 overflow-y-auto">
        @if ($gastos->count())
            <table class="mx-auto min-w-max w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <th class="py-3 px-6 text-left">#</th>
                        <th class="py-3 px-6 text-left">Fecha</th>
                        <th class="py-3 px-6 text-left">Tipo de gasto</th>
                        <th class="py-3 px-6 text-left">Total</th>
                        <th class="py-3 px-6 text-left">Recurso</th>
                        <th class="py-3 px-6 text-left">I-Extra</th>
                        <th class="py-3 px-6 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @php  $i = 1 + $page * $pag - $pag; @endphp
                    @foreach ($gastos as $gasto)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 capitalize">
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                {{ $i }}
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                {{ $gasto->fecha }}
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                @php
                                    if($gasto->gastoable_type=='App\Models\Alimento'){
                                        echo 'Alimento';
                                    }else if($gasto->gastoable_type=='App\Models\Energia'){
                                        echo 'Energia';
                                    }else if($gasto->gastoable_type=='App\Models\Alevin'){
                                        echo 'Alevines';
                                    }else{
                                        echo 'Varios';
                                    }
                                @endphp
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                $ {{ $gasto->total }}
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                {{ ($gasto->recurso==1? 'Granja 2T': 'VQ') }}
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <ul class="flex-column">
                                    @if ($gasto->gastoable_type=='App\Models\Alimento')
                                        <li><span class="font-bold">Tipo:</span> {{$gasto->gastoable->tipo}} </li>
                                        <li><span class="font-bold">Cantidad: </span> {{$gasto->gastoable->cantidad}} </li>
                                        <li><span class="font-bold">Precio:</span> $ {{$gasto->gastoable->precio_u}} </li>
                                    @elseif ($gasto->gastoable_type=='App\Models\Energia')
                                        <li><span class="font-bold">Blower:</span> $ {{$gasto->gastoable->blower}} </li>
                                        <li><span class="font-bold">Pozo: </span> $ {{$gasto->gastoable->pozo}} </li>
                                        <li><span class="font-bold">Dómestica:</span> $ {{$gasto->gastoable->domestica}} </li>
                                    @elseif ($gasto->gastoable_type=='App\Models\Alevin')
                                        <li><span class="font-bold">Cantidad: </span> {{$gasto->gastoable->cantidad}} </li>
                                        <li><span class="font-bold">Precio </span> ${{$gasto->gastoable->precio_u}} </li>
                                    @elseif ($gasto->gastoable_type=='App\Models\Vario')
                                        <li><span class="font-bold">Descripcion:</span> </li>
                                        <li class="w-40"> {{$gasto->gastoable->descripcion}} </li>

                                    @endif
                                </ul>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                {{-- <button wire:click="edit({{ $gasto }})" title="Editar gasto"
                                    class="btn_edit"><i class="fas fa-edit"></i></button> --}}
                                <button wire:click="destroy({{ $gasto }})" title="Eliminar gasto"
                                    class="btn_delete"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </td>
                    </tr>
                    @php  $i++; @endphp
                    @endforeach
                </tbody>
            </table>
            @if ($gastos->hasPages())
            <div class="px-3 py-3 bg-gray-300">
                {{ $gastos->links() }}
            </div>
        @endif
        @else
        <div class="px-3 py-2 bg-gray-300 text-white">
            No hay gastos que conincidan con su búsqueda
        </div>
        @endif
    </div>

    @include('admin.gastos.modales.alimento')
    @include('admin.gastos.modales.energia')
    @include('admin.gastos.modales.alevin')
    @include('admin.gastos.modales.varios')

    {{-- -Modal Eliminar --}}
    <div x-cloak x-show="open_destroy" x-transition:enter="ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
    x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
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
                            ¿Esta seguro de eliminar el gasto con fecha  <span
                                class="font-bold">{{ $gasto_inicial->fecha }}</span> ?
                        </h3>
                    </div>
                </div>
            </div>
            <div class=" bg-gray-100 px-4 py-3 sm:px-6 flex flex-row-reverse">
                <button @click="open_destroy=false" type="button" class="btn_close">
                    Cancelar
                </button>
                <button wire:click="destroy_confirmation()" type="button" class="btn_delete">
                    Continuar
                </button>
            </div>
        </div>
    </div>
</div>


</div>
