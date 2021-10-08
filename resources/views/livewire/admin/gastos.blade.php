<div>
    <div class="flex items-center justify-end">
        <div class="mr-5">
            Seleccione el tipo de gasto:
        </div>
        <select wire:model="tipo_guardar" class="input_text w-52" wire:model="tipo_modal">
            <option value="1">Alimento</option>
            <option value="2">Energia</option>
            <option value="3">Alevines</option>
            <option value="4">Varios</option>
        </select>
        <button class="btn_add" title="Agregar gasto" wire:click="modales()">
            <i class="fas fa-plus-circle"></i>
        </button>
    </div>


    <div class="bg-white shadow-md rounded my-6 overflow-y-auto">
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
                @php  $i=1; @endphp
                @foreach ($gastos as $gasto)
                <tr class="border-b border-gray-200 hover:bg-gray-100 capitalize sm:table-row hidden">
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
                                    <li><span class="font-bold">Precio: </span> ${{$gasto->gastoable->precio_u}} </li>
                                    <li><span class="font-bold">Cantidad:</span> {{$gasto->gastoable->cantidad}} </li>
                                @endif
                            </ul>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            <button wire:click="edit({{ $gasto }})" title="Editar gasto"
                                class="btn_edit"><i class="fas fa-edit"></i></button>
                            <button wire:click="destroy({{ $gasto }})" title="Eliminar gasto"
                                class="btn_delete"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </td>
                </tr>
                @php  $i++; @endphp
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modales agregar Alimento--}}
    <x-jet-dialog-modal wire:model="open_alimento" >
        <x-slot name="title">
            <div class="border-b-2">
                {{ $action_alimento }}  Gasto (<span class="font-bold">Alimento<span>)
            </div>
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-2" x-data="{cantidad:null,precio:null}">
                <div class="ml-2">
                    <label class="block mb-2 font-semibold" for="">Fecha: </label>
                    <input class="mb-3 input_text w-full" wire:model.defer="fecha" type="date">
                    @error('fecha')
                        <span class="input_text text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="ml-2">
                    <label class="block mb-2 font-semibold" for="">Tipo: </label>
                    <select class="mb-3 w-full input_text" wire:model.defer="tipo_alimento">
                        <option value="Grano">Grano</option>
                        <option value="Harina">Harina</option>
                    </select>
                    @error('tipo_alimento')
                        <span class=" text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="ml-2">
                    <label class="block mb-2 font-semibold" for="">Cantidad: </label>
                    <input class="mb-3 w-full input_text" wire:model.defer="cantidad_alimento" type="number"
                        placeholder="10" x-model="cantidad">
                    @error('cantidad_alimento')
                        <span class=" text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="ml-2">
                    <label class="block mb-2 font-semibold" for="">Precio unitario: </label>
                    <input class="mb-3 w-full input_text" wire:model.defer="precio_alimento" type="number"
                        placeholder="200.5" step="any" x-model="precio">
                    @error('precio_alimento')
                        <span class=" text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="ml-2">
                    <label class="block mb-2 font-semibold" for="">Total: </label>
                    <input class="mb-3 w-full input_text" type="number"
                     disabled x-model="cantidad*precio">
                    @error('total')
                        <span class=" text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="ml-2">
                    <label class="block mb-2 font-semibold" for="">Recurso: </label>
                    <select class="mb-3 w-full input_text" wire:model.defer="recurso">
                        <option value="1">Granja 2T</option>
                        <option value="2">VQ</option>
                    </select>
                    @error('recurso')
                        <span class=" text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button @if ($action_alimento == 'Agregar') class="btn_add" wire:click="store_alimento()"  @else class="btn_edit" wire:click="update()" @endif>Guardar</button>
            <button class="btn_close" wire:click="$set('open_alimento',close)">Cerrar</button>
        </x-slot>
    </x-jet-dialog-modal>


</div>
