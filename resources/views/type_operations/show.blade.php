@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $typeoperation->title }}</h1>
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($typeoperation->created_at)) }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Last Updated:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($typeoperation->updated_at)) }}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('tipo-operacao.edit', 'Editar', array($typeoperation->id), array('class' => 'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['tipo-operacao.destroy', $typeoperation->id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Deletar', ['class' => 'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {{ Html::linkRoute('tipo-operacao.index', 'Todas as tipo-operacaos', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection