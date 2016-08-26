@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $transaction->title }}</h1>
            <p>Saldo Inicial: {{ $transaction->value_initial }}</p>
            <p>Valor: {{ $transaction->value }}</p>
            <p><span class="label label-success">{{ $transaction->category->title }}</span></p>
            <p><span class="label label-success">{{ $transaction->source->title }}</span></p>
            <p>Compra em: {{ date('d/m/Y', strtotime($transaction->purchase_at)) }}</p>
            <p>Pagamento em: {{ date('d/m/Y', strtotime($transaction->payment_at)) }}</p>
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($transaction->created_at)) }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Last Updated:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($transaction->updated_at)) }}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('origem.edit', 'Editar', array($transaction->id), array('class' => 'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['origem.destroy', $transaction->id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Deletar', ['class' => 'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {{ Html::linkRoute('origem.index', 'Todas as origems', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection