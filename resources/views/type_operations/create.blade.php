@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Novo Tipo de Operação</h1>
            <hr>
            {!! Form::open(array('route' => 'tipo-operacao.store')) !!}
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

            {{ Form::submit('Criar', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
