@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>Tipos de Operação</h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('tipo-operacao.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Novo Tipo de Operação</a>
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

                @foreach ($typeoperations as $typeoperation)

                    <tr>
                        <th>{{ $typeoperation->id }}</th>
                        <td>{{ $typeoperation->title }}</td>
                        <td>{{ date('M j, Y', strtotime($typeoperation->created_at)) }}</td>
                        <td><a href="{{ route('tipo-operacao.show', $typeoperation->id) }}" class="btn btn-default btn-sm">Visualizar</a>
                            <a href="{{ route('tipo-operacao.edit', $typeoperation->id) }}"
                               class="btn btn-default btn-sm">Editar</a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>

            <div class="text-center">
                {!! $typeoperations->links(); !!}
            </div>
        </div>
    </div>
@endsection
