{{-- Modales agregar Alimento--}}
<x-jet-dialog-modal wire:model="open_alimento" >
    <x-slot name="title">
        <div class="border-b-2">
            {{ $action_alimento }}  Gasto (<span class="font-bold">Alimento<span>)
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="grid grid-cols-2" x-data="{cantidad:null,precio:null}"  @reset.window="cantidad=null,precio=null">
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
        <button class="btn_close" wire:click="$set('open_alimento',false)">Cerrar</button>
    </x-slot>
</x-jet-dialog-modal>
