@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>Categorias</h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('categoria.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Nova
                Categoria</a>
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

                @foreach ($categories as $category)

                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->title }}</td>
                        <td>{{ date('M j, Y', strtotime($category->created_at)) }}</td>
                        <td><a href="{{ route('categoria.show', $category->id) }}" class="btn btn-default btn-sm">Visualizar</a>
                            <a href="{{ route('categoria.edit', $category->id) }}"
                               class="btn btn-default btn-sm">Editar</a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>

            <div class="text-center">
                {!! $categories->links(); !!}
            </div>
        </div>
    </div>
@endsection
