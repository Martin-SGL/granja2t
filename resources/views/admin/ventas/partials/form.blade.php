<div class="grid sm:grid-cols-2  gap-x-2">
    <div>
        {!! Form::label('cliente_id','Clientes:' ,['class'=>'font-bold']) !!}
        {!! Form::select('cliente_id', $clientes, null, ['class' => 'input_text w-full mt-2']) !!}
        @error('cliente_id')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        {!! Form::label('fecha','Fecha:' ,['class'=>'font-bold ']) !!}
        {!! Form::date('fecha', $fecha, ['class'=>'input_text w-full mt-2']) !!}
    </div>
    @error('fecha')
    <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</div>
<div class="mt-3">
    <div class="font-bold mb-2">Estanques:</div>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5">
        @foreach ($estanques as $estanque)
            <label class="flex cursor-pointer" for="estanque{{ $estanque->id }}">
                <div class="w-28">
                    {{ $estanque->nombre }}
                </div>
                <div>
                    {!! Form::radio('estanque_id', $estanque->id, null, ['id' => "estanque$estanque->id", 'class' => 'mr-2 ml-2']) !!}
                </div>
            </label>
        @endforeach
    </div>
    @error('estanque_id')
    <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</div>
<div @if(isset($venta)) x-data="{venta:{{$venta->peizas}},kilos:{{$venta->kilos}}, precio:{{$venta->precio}}, total:{{$venta->total}}}"
    @else   x-data="{ 
                    piezas:{{old('piezas') ? old('piezas'): 0
                }},
                    kilos:{{ old('kilos') ? old('kilos') : 0 }},
                    precio:{{ old('precio') ? old('precio') : 0 }}, 
                    total
                }"
    @endif  class="mt-3 grid sm:grid-cols-4 gap-x-3">
    <div>
        {!! Form::label('piezas', 'Piezas: ', ['class'=>'font-bold']) !!}
        {!! Form::number('piezas', null, ['class'=>'input_text w-full mt-2','x-model'=>'piezas']) !!}
        @error('piezas')
        <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        {!! Form::label('kilos', 'Kilos: ', ['class'=>'font-bold']) !!}
        {!! Form::number('kilos', null, ['class'=>'input_text w-full mt-2','x-model'=>'kilos']) !!}
        @error('kilos')
        <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        {!! Form::label('precio', 'Precio(kg): ', ['class'=>'font-bold']) !!}
        {!! Form::number('precio', null, ['class'=>'input_text w-full mt-2','x-model'=>'precio']) !!}
        @error('precio')
        <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
   <div>
        {!! Form::label('total', 'Total: ', ['class'=>'font-bold']) !!}
        {!! Form::number('total', null, ['class'=>'input_text w-full mt-2 bg-gray-100','x-model'=>'kilos*precio', 'readonly'=>'true']) !!}
        @error('total')
        <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
   </div>
</div>
