@extends('layouts.admin')
@section('content')

    <div class="bg-white shadow-md rounded my-6 overflow-y-auto p-3">
        {!! Form::model($venta, ['route' => ['admin.ventas.update',$venta], 'autocomplete' => 'off', 'method'=>'put']) !!}
            @include('admin.ventas.partials.form')
            <div class="mt-3 flex flex-row-reverse">
                {!! Form::submit('Guardar', ['class'=>'btn_edit cursor-pointer']) !!}
            </div>
        {!! Form::close() !!}
    </div>

@endsection