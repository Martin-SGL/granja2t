@extends('layouts.admin')
@section('content')

    <div x-data="{guardar:false,total:{{count($nomina->empleados)}}}" x-on:operaciones.window="total = total + parseInt($event.detail.dias==0?1:-1); total==0 ? guardar=true : guardar=false;"  class="bg-white shadow-md rounded p-2 flex justify-between">
        <div class="font-semibold flex items-center">
            @php
                $fecha_ini = date('d/m/Y', strtotime($nomina->semana));
                $fecha_fin = date('d/m/Y', strtotime($nomina->semana. '+ 6 days'));
                echo 'Semana:&nbsp;<span class="font-normal">['.$fecha_ini.']</span>-<span class="font-normal">['.$fecha_fin.']</span>';
            @endphp
        </div>
        <div>
            {!! Form::model($nomina, ['route' => ['admin.nominas.update',$nomina], 'autocomplete' => 'off', 'method'=>'put']) !!}
            {!! Form::text('semana', $nomina->semana, ['class'=>'hidden']) !!}
            {!! Form::submit('Guardar', [':class'=>'{"btn_edit cursor-pointer":guardar==false,"btn_delete cursor-pointer": guardar==true}','x-bind:disabled=guardar',
            'x-bind:title'=>'(guardar==false?"":"Debe tener al menos un trabajador activo")']) !!}
        </div>
    </div>


    @include('admin.nominas.partials.form-edit')


    {!! Form::close() !!}

@endsection
