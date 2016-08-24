@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Nova origem</h1>
            <hr>
            {!! Form::open(array('route' => 'origem.store')) !!}
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

            {{ Form::label('value_initial', 'Saldo Inicial:') }}
            {{ Form::text('value_initial', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '15')) }}

            {{ Form::label('type_operation_id', 'Tipo de Operação:') }}
            <select class="form-control" name="type_operation_id">
                @foreach($typeoperations as $typeoperation)
                    <option value="">Selecione</option>
                    <option value='{{ $typeoperation->id }}'>{{ $typeoperation->title }}</option>
                @endforeach

            </select>

            {{ Form::submit('Criar', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
