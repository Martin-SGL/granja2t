@extends('layouts.admin')
@section('content')

    <div class="bg-white shadow-md rounded my-6 overflow-y-auto p-3">
        {!! Form::open(['route' => 'admin.ventas.store', 'autocomplete' => 'off']) !!}
            @include('admin.ventas.partials.form')
            <div class="mt-3 flex flex-row-reverse">
                {!! Form::submit('Guardar', ['class'=>'btn_add cursor-pointer']) !!}
            </div>
        {!! Form::close() !!}
    </div>

@endsection
