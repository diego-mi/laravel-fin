@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>Transações</h1>
            </div>

            <div class="col-md-2">
                <a href="{{ route('transacao.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Nova Transação</a>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
        </div> <!-- end of .row -->

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Created At</th>
                    <th></th>
                    </thead>

                    <tbody>

                    @foreach ($transactions as $transaction)

                        <tr>
                            <th>{{ $transaction->id }}</th>
                            <td>{{ $transaction->title }}</td>
                            <td>{{ date('M j, Y', strtotime($transaction->created_at)) }}</td>
                            <td><a href="{{ route('transacao.show', $transaction->id) }}" class="btn btn-default btn-sm">Visualizar</a> <a href="{{ route('transacao.edit', $transaction->id) }}" class="btn btn-default btn-sm">Editar</a></td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

                <div class="text-center">
                    {!! $transactions->links(); !!}
                </div>
            </div>
        </div>
    </div>
@endsection
