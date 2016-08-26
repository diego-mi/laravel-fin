@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Nova Transação</h1>
            <hr>
            {!! Form::open(array('route' => 'transacao.store')) !!}
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

            {{ Form::label('description', 'Descrição:') }}
            {{ Form::text('description', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

            {{ Form::label('value', 'Valor:') }}
            {{ Form::text('value', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '15')) }}

            {{ Form::label('category_id', 'Categoria:') }}
            <select class="form-control" name="category_id">
                <option value="">Selecione</option>
                @foreach($categories as $category)
                    <option value='{{ $category->id }}'>{{ $category->title }}</option>
                @endforeach

            </select>

            {{ Form::label('source_id', 'Origem:') }}
            <select class="form-control" name="source_id">
                <option value="">Selecione</option>
                @foreach($sources as $source)
                    <option value='{{ $source->id }}'>{{ $source->title }}</option>
                @endforeach

            </select>

            {{ Form::label('purchase_at', 'Compra em:') }}
            {{ Form::date('purchase_at', \Carbon\Carbon::now(), ['class' => 'form-control']) }}

            {{ Form::label('payment_at', 'Pagamento em:') }}
            {{ Form::date('payment_at', null, ['class' => 'form-control']) }}

            {{ Form::submit('Criar', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
