@extends('layouts.app')

@section('title', 'Авторы')


@section('content')
    <div class="container">
        <a href="{{ route('authors.create') }}" class="btn btn-success">Создать нового автора</a>

        @if(session()->get('success'))
            <div class="alert alert-success mt-3">
                {{ session()->get('success') }}
            </div>
        @endif

        <table class="table table-striped mt-3">
            <thead>
            <tr>
                <th scope="col">Номер</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Имя</th>
                <th scope="col">Отчество</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <th scope="row">{{ $author->id }}</th>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->surname}}</td>
                    <td>{{ $author->patronymic}}</td>

                    <td class="table-buttons">
                        <a href="{{ route('authors.show', $author) }}" class="btn btn-success">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('authors.edit', $author) }}" class="btn btn-primary">
                            <i class="fas fa-edit" ></i>
                        </a>
                        <form method="POST" action="{{ route('authors.destroy', $author) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

