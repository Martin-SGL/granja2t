<div x-data="{open_destroy: @entangle('open_destroy'), active:true}">
    <div class="flex w-full border-b-2 rounded" @custom-event.window="mensaje = $event.detail">
        <div :class="{'border-2 bg-white' : active==true}" x-on:click="active=true"
            class="text-md px-2 py-1 border-b-0 rounded cursor-pointer hover:bg-gray-100">Resumen</div>
        <div :class="{'border-2 bg-white' : active==false}" x-on:click="active=false"
            class="text-md px-2 py-1 border-b-0 rounded cursor-pointer hover:bg-gray-100">Detalle</div>
    </div>
    <div>
        {{--Area de resumen--}}
        <div x-show="active"
                x-transition:enter="ease-out duration-1000"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
          
                <div class="bg-white shadow-md rounded my-6 overflow-y-auto">
                    <table class="mx-auto min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">#</th>
                                <th class="py-3 px-6 text-left">Estanque</th>
                                <th class="py-3 px-6 text-left">Merma </th>
                                <th class="py-3 px-6 text-left">Total </th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @php $i=1; @endphp
                            @foreach ($estanques as $estanque)
                                <tr class="border-b border-gray-200 hover:bg-gray-100 capitalize">
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            {{ $i }}
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            {{ $estanque->nombre }}
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            {{$estanque->mermas->sum('cantidad')}}
                                        </div>
                                    </td>
                                    @if ($i==1)
                                       <td rowspan="{{$estanques->count()}}" class="text-4xl py-3 border-1 border-l-2 border-r-2 text-center hover:bg-gray-400 hover:text-white">
                                            {{$total}}
                                        </td> 
                                    @endif
                                </tr>
                                @php $i++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>    
        </div>
        {{--Area de detalle--}}
        <div x-show="!active"
                x-transition:enter="ease-out duration-1000"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
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

                <select wire:model="estanque_search" class="input_text w-full ml-2">
                    <option value="">Todos los estanques</option>
                    @foreach ($estanques as $estanque)
                        <option value="{{ $estanque->id }}">{{ $estanque->nombre }}</option>
                    @endforeach
                </select>

                <button wire:click="init(true)" title="Agregar merma" class="btn_add"><i
                        class="fas fa-plus-circle"></i></button>
            </div>
            <div class="bg-white shadow-md rounded my-6 overflow-y-auto">
                @if ($mermas->count())
                    <table class="mx-auto min-w-max w-full table-auto">
                        <thead class="sm:table-header-group  hidden">
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">#</th>
                                <th class="py-3 px-6 text-left">Fecha</th>
                                <th class="py-3 px-6 text-left">Cantidad</th>
                                <th class="py-3 px-6 text-left">Estanque</th>
                                <th class="py-3 px-6 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <!-- Responsive table head-->
                        <thead class="sm:hidden">
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
                            @foreach ($mermas as $merma)
                                <tr class="border-b border-gray-200 hover:bg-gray-100 capitalize sm:table-row hidden">
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            {{ $i }}
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            {{ $merma->fecha }}
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            {{ $merma->cantidad }}
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            {{ $merma->estanque->nombre }}
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <button wire:click="edit({{ $merma }})" title="Editar merma"
                                                class="btn_edit"><i class="fas fa-edit"></i></button>
                                            <button wire:click="destroy({{ $merma }})" title="Eliminar merma"
                                                class="btn_delete"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                 <!-- Responsive table body-->
                                <tr class="border-b border-gray-200 hover:bg-gray-100 capitalize sm:hidden table-row">
                                    <td  class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            {{$i}}
                                        </div>
                                    </td>
                                    <td  class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <ul>
                                                <li> <span class="font-bold">Fecha:</span> {{$merma->fecha}}</li>
                                                <li> <span class="font-bold">Cantidad:</span> {{$merma->cantidad}}</li>
                                                <li> <span class="font-bold">Estanque:</span> {{$merma->estanque->nombre}}</li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <button wire:click="edit({{ $merma }})" title="Editar merma"
                                                class="btn_edit"><i class="fas fa-edit"></i></button>
                                            <button wire:click="destroy({{ $merma }})" title="Eliminar merma"
                                                class="btn_delete"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                @php $i++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                    @if ($mermas->hasPages())
                        <div class="px-3 py-3 bg-gray-300">
                            {{ $mermas->links() }}
                        </div>
                    @endif
                @else
                    <div class="px-3 py-2 bg-gray-300 text-white">
                        No hay mermas que conincidan con su búsqueda
                    </div>
                @endif
            </div>

            {{-- Modales --}}
            <x-jet-dialog-modal wire:model="open">
                <x-slot name="title">
                    <div class="border-b-2">
                        {{ $action }} Merma
                    </div>
                </x-slot>
                <x-slot name="content">
                    <div class="grid grid-cols-2">
                        <div>
                            <label class="block mb-2 font-semibold" for="">Fecha: </label>
                            <input class="mb-3 input_text w-full" wire:model.defer="fecha" type="date">
                            @error('fecha')
                                <span class="input_text text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="ml-2">
                            <label class="block mb-2 font-semibold" for="">Cantidad: </label>
                            <input class="mb-3 w-full input_text" wire:model.defer="cantidad" type="number"
                                placeholder="10">
                            @error('cantidad')
                                <span class=" text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <label class="block mb-2 font-semibold" for="">Estanque: </label>
                    <select class="input_text w-full" wire:model.defer="estanque_merma">
                        <option selected disabled>Seleccione un estanque</option>
                        <option class="hidden" value="" selected>Seleccione un estanque</option>
                        @foreach ($estanques as $estanque)
                            <option value="{{ $estanque->id }}">{{ $estanque->nombre }}</option>
                        @endforeach
                    </select>
                    @error('cantidad')
                        <span class=" text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </x-slot>
                <x-slot name="footer">
                    <button @if ($action == 'Agregar') class="btn_add" wire:click="store()"  @else class="btn_edit" wire:click="update()" @endif>Guardar</button>
                    <button class="btn_close" wire:click="$set('open',close)">Cerrar</button>
                </x-slot>
            </x-jet-dialog-modal>

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
                                        ¿Esta seguro de eliminar la merma con fecha  <span
                                            class="font-bold">{{ $merma_inicial->fecha }}</span> ?
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
    </div>
</div>
