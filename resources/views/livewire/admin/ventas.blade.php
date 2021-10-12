<div x-data="{open_destroy: @entangle('open_destroy')}">
    <div class="flex w-full pl-2 text-lg italic">
        <h2>El total de ventas es: <span class="font-bold">$ {{number_format($total, 2)}}</span></h2>
    </div>
    <div class="flex w-full mt-2">
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

        <select wire:model="cliente_search" class="input_text w-full ml-2">
            <option value="">Todos los Clientes</option>
            @foreach ($clientes as $cliente)
                <option value="{{$cliente->id}}">{{ $cliente->nombre }}</option>
            @endforeach
        </select>

        <a href="{{ route('admin.ventas.create') }}"><button title="Agregar cliente" class="btn_add"><i
                    class="fas fa-plus-circle"></i></button></a>
    </div>
    <div class="bg-white shadow-md rounded my-6 overflow-y-auto">
        @if ($ventas->count())
            <table class="mx-auto min-w-max w-full table-auto">
                <thead class="lg:table-header-group  hidden">
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">#</th>
                        <th class="py-3 px-6 text-left">Cliente</th>
                        <th class="py-3 px-6 text-left">Fecha</th>
                        <th class="py-3 px-6 text-left">Estanque</th>
                        <th class="py-3 px-6 text-left">Piezas</th>
                        <th class="py-3 px-6 text-left">Kilos</th>
                        <th class="py-3 px-6 text-left">Precio(kg)</th>
                        <th class="py-3 px-6 text-left">Total</th>
                        <th class="py-3 px-6 text-left">Acciones</th>
                    </tr>
                </thead>
                <!-- Responsive table head-->
                <thead class="lg:hidden">
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th width="20px" class="py-3 px-6 text-left">#</th>
                        <th class="py-3 px-6 text-left">Registros</th>
                        <th class="py-3 px-6 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @php
                        $i = 1 + $page * $pag - $pag;
                    @endphp
                    @foreach ($ventas as $venta)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 capitalize lg:table-row hidden">
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $i }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $venta->cliente->nombre }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $venta->fecha }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $venta->estanque->nombre }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $venta->piezas }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $venta->kilos }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    $ {{ $venta->precio }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    $ {{ $venta->total }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <a href="{{ route('admin.ventas.edit', $venta) }}"><button title="Editar venta"
                                            class="btn_edit"><i class="fas fa-edit"></i></button></a>
                                    <button wire:click="destroy({{ $venta }})" title="Eliminar venta"
                                        class="btn_delete"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                        <!-- Responsive table body-->
                        <tr class="border-b border-gray-200 hover:bg-gray-100 capitalize lg:hidden table-row">
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $i }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <ul>
                                        <li> <span class="font-bold">Cliente:</span> {{ $venta->cliente->nombre }}</li>
                                        <li> <span class="font-bold">Fecha:</span> {{ $venta->fecha }}</li>
                                        <li> <span class="font-bold">Estanque:</span> {{ $venta->estanque->nombre }}
                                        </li>
                                        <li> <span class="font-bold">Piezas:</span> {{ $venta->piezas }}</li>
                                        <li> <span class="font-bold">Kilos:</span> {{ $venta->kilos }}</li>
                                        <li> <span class="font-bold">Precio(kg):</span> {{ $venta->kilos }}</li>
                                        <li> <span class="font-bold">Total:</span> {{ $venta->total }}</li>
                                    </ul>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <a href="{{ route('admin.ventas.edit', $venta) }}"><button title="Editar venta"
                                            class="btn_edit"><i class="fas fa-edit"></i></button></a>
                                    <button wire:click="destroy({{ $venta }})" title="Eliminar venta"
                                        class="btn_delete"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                        @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>
            @if ($ventas->hasPages())
                <div class="px-3 py-3 bg-gray-300">
                    {{ $ventas->links() }}
                </div>
            @endif
        @else
            <div class="px-3 py-2 bg-gray-300 text-white">
                No hay ventas que conincidan con su búsqueda
            </div>
        @endif


    </div>

    {{-- -Modal Eliminar --}}
    <div x-cloak x-show="open_destroy" x-transition:enter="ease-out duration-300"
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
                                ¿Esta seguro de eliminar la venta con fecha
                                <span class="font-bold">{{ $venta_eliminar->fecha }}</span> para el cliente
                                <span class="font-bold">
                                    @if (isset($venta_eliminar->cliente->nombre))
                                        {{ $venta_eliminar->cliente->nombre }}@endif
                                </span> ?
                            </h3>
                        </div>
                    </div>
                </div>
                <div class=" bg-gray-100 px-4 py-3 sm:px-6 flex flex-row-reverse">
                    <button @click="open_destroy=false" type="button" class="btn_close">
                        Cancelar
                    </button>
                    <button wire:click="confirm_destroy()" @click="open_destroy=false" type="submit" class="btn_delete">
                        Continuar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
