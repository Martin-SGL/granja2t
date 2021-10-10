{{-- Modales agregar Alevin--}}
<x-jet-dialog-modal wire:model="open_varios" >
    <x-slot name="title">
        <div class="border-b-2">
            {{ $action_alevin }}  Gasto (<span class="font-bold">Alevin<span>)
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="grid grid-cols-2">
            <div class="ml-2">
                <label class="block mb-2 font-semibold" for="">Fecha: </label>
                <input class="mb-3 input_text w-full" wire:model.defer="fecha" type="date">
                @error('fecha')
                    <span class="input_text text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="ml-2">
                <label class="block mb-2 font-semibold" for="">Precio total </label>
                <input class="mb-3 w-full input_text" wire:model.defer="precio_varios" type="number"
                    placeholder="200.5" step="any">
                @error('precio_varios')
                    <span class=" text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="ml-2 col-span-2">
                <label class="block mb-2 font-semibold" for="">Descripción: </label>
                <textarea wire:model.defer="descripcion" cols="30" maxlength="100" class="mb-3 w-full input_text" autocomplete="off"></textarea>
                @error('descripcion')
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
        <button @if ($action_varios == 'Agregar') class="btn_add" wire:click="store_varios()"  @else class="btn_edit" wire:click="update()" @endif>Guardar</button>
        <button class="btn_close" wire:click="$set('open_varios',false)">Cerrar</button>
    </x-slot>
</x-jet-dialog-modal>
