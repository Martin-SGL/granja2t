<div>

    <div class="flex w-full">
        <input wire:model="search" class="w-full input_search" type="text" placeholder="Escriba nombre, negocio o telefono para buscar registros">
        <button wire:click="init(true)" class="btn_add">Agregar</button>
    </div>

    <div class="bg-white shadow-md rounded my-6 overflow-y-auto">
        @if ($clientes->count())
            <table class="min-w-max w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th width="20px" class="py-3 px-6 text-left">#</th>
                        <th class="py-3 px-6 text-left">Nombre</th>
                        <th class="py-3 px-6 text-left">Negocio</th>
                        <th class="py-3 px-6 text-left">Teléfono</th>
                        <th class="py-3 px-6 text-left">Domicilio</th>
                        <th width="50px" class="py-3 px-6 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @php $i=1; @endphp
                    @foreach ($clientes as $cliente)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $i }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $cliente->nombre }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left ">
                                <div class="flex items-center">
                                    {{ $cliente->negocio }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left ">
                                <div class="flex items-center">
                                    {{ $cliente->telefono }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <ul>
                                        <li>{{ $cliente->calle }}&nbsp;#{{ $cliente->numero }}</li>
                                        <li>{{ $cliente->municipio_estado }}</li>
                                    </ul>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <button wire:click="edit({{$cliente}})" class="btn_edit">Editar</button>
                                </div>
                            </td>
                        </tr>
                        @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>
            @if ($clientes->hasPages())
                <div class="px-3 py-3 bg-gray-300">
                    {{$clientes->links()}}
                </div>
            @endif
           
         @else
            <div class="px-3 py-2 bg-gray-300 text-white">
                No hay clientes que conincidan con su busqueda
            </div>
         @endif
        
    </div>

    {{-- Modales --}}
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            <div class="border-b-2">
            {{$action}} Cliente
            </div>
        </x-slot>
        <x-slot name="content">
            <label class="block mb-2 font-semibold"  for="">Nombre: </label> 
            <input class="mb-3 w-full input_text" wire:model.defer="nombre" type="text" maxlength="50" placeholder="Juan José Sotomayor Amezcua">
            @error('nombre')
                <span class=" text-sm text-red-600">{{$message}}</span>
            @enderror
            <label class="block mb-2 font-semibold"   for="">Negocio: </label> 
            <input class="mb-3 w-full input_text" wire:model.defer="negocio"  type="text"  maxlength="30" placeholder="El Cahuite">
            @error('negocio')
                <span class=" text-sm text-red-600">{{$message}}</span>
            @enderror
            <label class="block mb-2 font-semibold"   for="">Telefono: </label> 
            <input class="mb-3 w-full input_text" wire:model.defer="telefono"  type="number" min="1" max="2" placeholder="3133333243">
            @error('telefono')
                <span class=" text-sm text-red-600">{{$message}}</span>
            @enderror
            <label class="block mb-2 font-semibold"  for="">Calle: </label> 
            <input class="mb-3 w-full input_text" wire:model.defer="calle" type="text" maxlength="45" placeholder="Donato Guerra">
            @error('calle')
                <span class=" text-sm text-red-600">{{$message}}</span>
            @enderror
            <label class="block mb-2 font-semibold"  for="">Numero: </label> 
            <input class="mb-3 w-full input_text" wire:model.defer="numero" type="number" min="1" max="7"  placeholder="57">
            @error('numero')
                <span class=" text-sm text-red-600">{{$message}}</span>
            @enderror
            <label class="block mb-2 font-semibold"  for="">Municipio y Estado: </label> 
            <input class="mb-3 w-full input_text" wire:model.defer="municipio_estado" type="text" maxlength="50" placeholder="Armería, Colima">
            @error('municipio_estado')
                <span class=" text-sm text-red-600">{{$message}}</span>
            @enderror
        </x-slot>
        <x-slot name="footer">
            <button @if($action=="Agregar") class="btn_add" wire:click="store()"  @else class="btn_edit" wire:click="update()" @endif>Guardar</button>
            <button class="btn_close" wire:click="$set('open',close)">Cerrar</button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
