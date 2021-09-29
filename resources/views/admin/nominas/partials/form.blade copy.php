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
            @foreach ($empleados as $empleado)
            @php
                $dias = $empleado->puesto->lu + $empleado->puesto->ma +$empleado->puesto->mi+
                        $empleado->puesto->ju+$empleado->puesto->vi+$empleado->puesto->sa+
                        $empleado->puesto->do;
            @endphp
                <tr x-data="{dias:{{$dias}},salario:'{{$empleado->salario_dia}}', trabajo:'true'}" class="border-b border-gray-200 hover:bg-gray-100 capitalize">
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            {{ $i+1 }}
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            {{$empleado->nombre}}
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            {!! Form::number('salario[]', null, ['x-model'=>'salario','class'=>'input_text w-28 text-sm']) !!}
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex flex-col">
                            <label class="flex cursor-pointer" for="lunes{{$i}}">
                                <div class="w-16 cursor-pointer">Lunes</div>
                                {!! Form::checkbox('lunes[]', 1, $empleado->puesto->lu,
                                [
                                    '@change'=>'dias += ($event.target.checked) ? +$event.target.value : -$event.target.value',
                                    'class'=>'mr-2 input_text cursor-pointer mt-1'
                                ]) !!}
                            </label>
                            <label class="flex cursor-pointer" for="martes{{$i}}">
                                <div class="w-16 cursor-pointer">Martes</div>
                                {!! Form::checkbox('martes[]', 1, $empleado->puesto->ma,
                                [
                                    '@change'=>'dias += ($event.target.checked) ? +$event.target.value : -$event.target.value',
                                    'class'=>'mr-2 input_text cursor-pointer mt-1'
                                ]) !!}
                            </label>
                            <label class="flex cursor-pointer" for="miercoles{{$i}}">
                                <div class="w-16 cursor-pointer">Miercoles</div>
                                {!! Form::checkbox('miercoles[]', 1, $empleado->puesto->mi,
                                [
                                    '@change'=>'dias += ($event.target.checked) ? +$event.target.value : -$event.target.value',
                                    'class'=>'mr-2 input_text cursor-pointer mt-1'
                                ]) !!}
                            </label>
                            <label class="flex cursor-pointer" for="jueves{{$i}}">
                                <div class="w-16 cursor-pointer">Jueves</div>
                                {!! Form::checkbox('jueves[]', 1, $empleado->puesto->ju,
                                [
                                    '@change'=>'dias += ($event.target.checked) ? +$event.target.value : -$event.target.value',
                                    'class'=>'mr-2 input_text cursor-pointer mt-1'
                                ]) !!}
                            </label>
                            <label class="flex cursor-pointer" for="viernes{{$i}}">
                                <div class="w-16 cursor-pointer">Viernes</div>
                                {!! Form::checkbox('viernes[]', 1, $empleado->puesto->vi,
                                [
                                    '@change'=>'dias += ($event.target.checked) ? +$event.target.value : -$event.target.value',
                                    'class'=>'mr-2 input_text cursor-pointer mt-1'
                                ]) !!}
                            </label>
                            <label class="flex cursor-pointer" for="sabado{{$i}}">
                                <div class="w-16 cursor-pointer">Sabado</div>
                                {!! Form::checkbox('sabado[]', 1, $empleado->puesto->sa,
                                [
                                    '@change'=>'dias += ($event.target.checked) ? +$event.target.value : -$event.target.value',
                                    'class'=>'mr-2 input_text cursor-pointer mt-1'
                                ]) !!}
                            </label>
                            <label class="flex cursor-pointer" for="domingo{{$i}}">
                                <div class="w-16 cursor-pointer">Domingo</div>
                                {!! Form::checkbox('domingo[]',1, $empleado->puesto->do,
                                [
                                    '@change'=>'dias += ($event.target.checked) ? +$event.target.value : -$event.target.value',
                                    'class'=>'mr-2 input_text cursor-pointer mt-1'
                                ]) !!}
                            </label>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            {!! Form::number('total[]', null,
                            ['x-model'=>'dias*salario','class'=>'bg-gray-100 input_text w-28 text-sm','readonly'=>'true']
                            ) !!}
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            <select class="input_text w-28 text-sm" name="recurso[]">
                                <option value="0">Granja 2T</option>
                                <option value="1">VQ</option>
                            </select>
                         </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <label class="switch">
                            <input type="checkbox" checked name="trabajo[]">
                            <span class="slider round"></span>
                          </label>
                    </td>


                </tr>
                @php $i++; @endphp
            @endforeach
        </tbody>
    </table>
</div>


