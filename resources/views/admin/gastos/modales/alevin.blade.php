{{-- Modales agregar Alevin--}}
<x-jet-dialog-modal wire:model="open_alevin" >
    <x-slot name="title">
        <div class="border-b-2">
            {{ $action_alevin }}  Gasto (<span class="font-bold">Alevin<span>)
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
            <div>
                <!-- brincar al siguiente row -->
            </div>
            <div class="ml-2">
                <label class="block mb-2 font-semibold" for="">Cantidad: </label>
                <input class="mb-3 w-full input_text" wire:model.defer="cantidad_alevin" type="number"
                    placeholder="1000000" x-model="cantidad">
                @error('cantidad_alevin')
                    <span class=" text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="ml-2">
                <label class="block mb-2 font-semibold" for="">Precio unitario: </label>
                <input class="mb-3 w-full input_text" wire:model.defer="precio_alevin" type="number"
                    placeholder="200.5" step="any" x-model="precio">
                @error('precio_alevin')
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
        <button @if ($action_alevin == 'Agregar') class="btn_add" wire:click="store_alevin()"  @else class="btn_edit" wire:click="update()" @endif>Guardar</button>
        <button class="btn_close" wire:click="$set('open_energia',false)">Cerrar</button>
    </x-slot>
</x-jet-dialog-modal>
