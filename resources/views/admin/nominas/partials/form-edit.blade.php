<div class="bg-white shadow-md rounded my-6 overflow-y-auto">
    <table class="mx-auto min-w-max w-full table-auto">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                <th class="py-3 px-6 text-left">#</th>
                <th class="py-3 px-6 text-left">Empleado</th>
                <th class="py-3 px-6 text-left">Salario(día)</th>
                <th class="py-3 px-6 text-left">Dias</th>
                <th class="py-3 px-6 text-left">Total</th>
                <th class="py-3 px-6 text-left">Recurso</th>
                <th class="py-3 px-6 text-left">¿Trabajó?</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @php
                $i = 0;
            @endphp
            @foreach ($nomina->empleados as $empleado)
                <tr x-data="main{{$i}}()" class="border-b border-gray-200 hover:bg-gray-100 capitalize">
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            {{ $i+1 }}
                            {!! Form::number('id[]', $empleado->id, ['class'=>'hidden']) !!}
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            {{$empleado->nombre}}
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex flex-col items-center">
                            {!! Form::number("salario[]", null, ['x-model'=>'salario','class'=>'input_text w-28 text-sm']) !!}

                            @error("salario.$i")
                                <p>
                                    <span class="text-sm text-red-600 normal-case">{{ $message }}</span>
                                </p>
                            @enderror
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex flex-col">
                            <label class="flex cursor-pointer" for="lunes{{$i}}">
                                <div class="w-16 cursor-pointer">Lunes</div>
                                <input type="checkbox" class="hidden" name="lunes[{{$i}}]" value='0' checked>
                                {!! Form::checkbox("lunes[$i]", 1, null,
                                [
                                    '@change'=>'SumRes(event)',
                                    'x-model'=>'lun',
                                    'class'=>'mr-2 input_text cursor-pointer mt-1'
                                ]) !!}
                            </label>
                            <label class="flex cursor-pointer" for="martes{{$i}}">
                                <div class="w-16 cursor-pointer">Martes</div>
                                <input type="checkbox" class="hidden" name="martes[{{$i}}]" value='0' checked>
                                {!! Form::checkbox("martes[$i]", 1,null,
                                [
                                    '@change'=>'SumRes(event)',
                                    'x-model'=>'mar',
                                    'class'=>'mr-2 input_text cursor-pointer mt-1'
                                ]) !!}
                            </label>
                            <label class="flex cursor-pointer" for="miercoles{{$i}}">
                                <div class="w-16 cursor-pointer">Miercoles</div>
                                <input type="checkbox" class="hidden" name="miercoles[{{$i}}]" value='0' checked>
                                {!! Form::checkbox("miercoles[$i]", 1, null,
                                [
                                    '@change'=>'SumRes(event)',
                                    'x-model'=>'mie',
                                    'class'=>'mr-2 input_text cursor-pointer mt-1'
                                ]) !!}
                            </label>
                            <label class="flex cursor-pointer" for="jueves{{$i}}">
                                <div class="w-16 cursor-pointer">Jueves</div>
                                <input type="checkbox" class="hidden" name="jueves[{{$i}}]" value='0' checked>
                                {!! Form::checkbox("jueves[$i]", 1, null,
                                [
                                    '@change'=>'SumRes(event)',
                                    'x-model'=>'jue',
                                    'class'=>'mr-2 input_text cursor-pointer mt-1'
                                ]) !!}
                            </label>
                            <label class="flex cursor-pointer" for="viernes{{$i}}">
                                <div class="w-16 cursor-pointer">Viernes</div>
                                <input type="checkbox" class="hidden" name="viernes[{{$i}}]" value='0' checked>
                                {!! Form::checkbox("viernes[$i]", 1, null,
                                [
                                    '@change'=>'SumRes(event)',
                                    'x-model'=>'vie',
                                    'class'=>'mr-2 input_text cursor-pointer mt-1'
                                ]) !!}
                            </label>
                            <label class="flex cursor-pointer" for="sabado{{$i}}">
                                <div class="w-16 cursor-pointer">Sabado</div>
                                <input type="checkbox" class="hidden" name="sabado[{{$i}}]" value='0' checked>
                                {!! Form::checkbox("sabado[$i]", 1, null,
                                [
                                    '@change'=>'SumRes(event)',
                                    'x-model'=>'sab',
                                    'class'=>'mr-2 input_text cursor-pointer mt-1'
                                ]) !!}
                            </label>
                            <label class="flex cursor-pointer" for="domingo{{$i}}">
                                <div class="w-16 cursor-pointer">Domingo</div>
                                <input type="checkbox" class="hidden" name="domingo[{{$i}}]" value='0' checked>
                                {!! Form::checkbox("domingo[$i]",1, null,
                                [
                                    '@change'=>'SumRes(event)',
                                    'x-model'=>'dom',
                                    'class'=>'mr-2 input_text cursor-pointer mt-1'
                                ]) !!}
                            </label>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            {!! Form::number(null, null,
                            [
                                'x-model'=>'total()',
                                'class'=>'bg-gray-100 input_text w-28 text-sm','readonly'=>'true']
                            ) !!}
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            <select class="input_text w-28 text-sm" name="recurso[]">
                                @if ($empleado->pivot->recurso==1)
                                    <option value="1" selected>Granja 2T</option>
                                    <option value="2">VQ</option>
                                @else
                                    <option value="1">Granja 2T</option>
                                    <option value="2" selected>VQ</option>
                                @endif
                            </select>
                         </div>
                    </td>

                    <td class="py-3 px-6 text-left">
                        <input type="checkbox" class="hidden" name="trabajo[{{$i}}]" value='0' checked>
                        <label class="switch">

                            {!! Form::checkbox("trabajo[$i]",1, null,
                            [
                                '@change'=>'descanzar(event)',
                                'x-model'=>'trabajo',
                                'class'=>'mr-2 input_text cursor-pointer mt-1',
                                '@click' => '$dispatch("operaciones",{dias:dias})',
                            ]) !!}
                            <span class="slider round"></span>
                          </label>
                    </td>

                    {{--bloque de codigo javascript--}}
                    <script>
                        function main{!! json_encode($i) !!}()
                        {
                            return {
                                lun:parseInt({!! json_encode($empleado->pivot->lun) !!}),
                                mar:parseInt({!! json_encode($empleado->pivot->mar) !!}),
                                mie:parseInt({!! json_encode($empleado->pivot->mie) !!}),
                                jue:parseInt({!! json_encode($empleado->pivot->jue) !!}),
                                vie:parseInt({!! json_encode($empleado->pivot->vie) !!}),
                                sab:parseInt({!! json_encode($empleado->pivot->sab) !!}),
                                dom:parseInt({!! json_encode($empleado->pivot->dom) !!}),
                                trabajo:true,
                                dias:parseInt({!! json_encode($empleado->pivot->cantidad_dias) !!}),
                                salario:parseInt({!! json_encode($empleado->pivot->salario_dia) !!}),
                                total: function(){
                                    return (this.dias* this.salario);
                                },
                                SumRes(event){
                                    if(event.target.checked==true){
                                        this.dias =this.dias + 1;
                                    }else{
                                        this.dias =this.dias - 1;
                                    }
                                    this.dias==0 ?  window.dispatchEvent(new CustomEvent('operaciones', { detail: {dias:1}, bubbles: true }))
                                    : (this.dias==1 && this.trabajo==false? window.dispatchEvent(new CustomEvent('operaciones', { detail: {dias:0}, bubbles: true })):'');
                                    this.dias==0 ? this.trabajo=false : this.trabajo=true;
                                    return this.total;

                                },
                                descanzar(event){
                                    if(event.target.checked==true){
                                        this.lun=parseInt({!! json_encode($empleado->pivot->lun) !!});
                                        this.mar=parseInt({!! json_encode($empleado->pivot->mar) !!});
                                        this.mie=parseInt({!! json_encode($empleado->pivot->mie) !!});
                                        this.jue=parseInt({!! json_encode($empleado->pivot->jue) !!});
                                        this.vie=parseInt({!! json_encode($empleado->pivot->vie) !!});
                                        this.sab=parseInt({!! json_encode($empleado->pivot->sab) !!});
                                        this.dom=parseInt({!! json_encode($empleado->pivot->dom) !!});
                                        this.dias=parseInt({!! json_encode($empleado->pivot->cantidad_dias) !!});
                                    }else{
                                        this.lun=0;this.mar=0;this.mie=0;
                                        this.jue=0;this.vie=0;this.sab=0;
                                        this.dom=0;this.dias=0;
                                        return this.total;
                                    }
                                }

                            }

                        }

                    </script>
                </tr>
                @php $i++; @endphp
            @endforeach
        </tbody>
    </table>
</div>


