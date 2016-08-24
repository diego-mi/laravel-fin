@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>Origens</h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('origem.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Nova Origem</a>
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
                <th>Saldo Inicial</th>
                <th>Saldo Atual</th>
                <th>Categoria</th>
                <th>Created At</th>
                <th></th>
                </thead>

                <tbody>

                @foreach ($sources as $source)
                    <tr>
                        <th>{{ $source->id }}</th>
                        <td>{{ $source->title }}</td>
                        <td>{{ $source->value_initial }}</td>
                        <td>{{ $source->value }}</td>
                        <td><span class="label label-success">{{ $source->type_operation->title }}</span></td>
                        <td>{{ date('M j, Y', strtotime($source->created_at)) }}</td>
                        <td><a href="{{ route('origem.show', $source->id) }}" class="btn btn-default btn-sm">Visualizar</a>
                            <a href="{{ route('origem.edit', $source->id) }}"
                               class="btn btn-default btn-sm">Editar</a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>

            <div class="text-center">
                {!! $sources->links(); !!}
            </div>
        </div>
    </div>
@endsection
