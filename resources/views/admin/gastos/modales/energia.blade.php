{{-- Modales agregar Energia--}}
<x-jet-dialog-modal wire:model="open_energia">
    <x-slot name="title">
        <div class="border-b-2">
            {{ $action_energia }}  Gasto (<span class="font-bold">Energia<span>)
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="grid grid-cols-2" x-data="{blower:null,pozo:null,domestica:null}" @reset.window="blower=null,pozo=null,domestica=null">
            <div class="ml-2">
                <label class="block mb-2 font-semibold" for="">Fecha: </label>
                <input class="mb-3 input_text w-full" wire:model.defer="fecha" type="date">
                @error('fecha')
                    <span class="input_text text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="ml-2">
                <label class="block mb-2 font-semibold" for="">Blower: </label>
                <input class="mb-3 w-full input_text" wire:model.defer="blower" type="number"
                    placeholder="200.5" step="any" x-model="blower">
                @error('blower')
                    <span class=" text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="ml-2">
                <label class="block mb-2 font-semibold" for="">Pozo de agua: </label>
                <input class="mb-3 w-full input_text" wire:model.defer="pozo" type="number"
                    placeholder="200.5" step="any" x-model="pozo">
                @error('pozo')
                    <span class=" text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="ml-2">
                <label class="block mb-2 font-semibold" for="">Doméstica: </label>
                <input class="mb-3 w-full input_text" wire:model.defer="domestica" type="number"
                    placeholder="200.5" step="any" x-model="domestica">
                @error('domestica')
                    <span class=" text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="ml-2">
                <label class="block mb-2 font-semibold" for="">Total: </label>
                <input class="mb-3 w-full input_text" type="number"
                 disabled x-model="parseFloat(blower)+parseFloat(pozo)+parseFloat(domestica)">
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
        <button @if ($action_alimento == 'Agregar') class="btn_add" wire:click="store_energia()"  @else class="btn_edit" wire:click="update()" @endif>Guardar</button>
        <button class="btn_close" wire:click="$set('open_energia',false)">Cerrar</button>
    </x-slot>
</x-jet-dialog-modal>
