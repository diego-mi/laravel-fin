@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::model($typeoperation, ['route' => ['tipo-operacao.update', $typeoperation->id], 'method' => 'PUT']) !!}
        <div class="col-md-8">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($typeoperation->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($typeoperation->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('tipo-operacao.show', 'Cancel', array($typeoperation->id), array('class' => 'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Editar', ['class' => 'btn btn-success btn-block']) }}
                    </div>
                </div>

            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection