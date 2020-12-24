@extends('layouts.app')

@section('title', 'Журнал')


@section('content')
    <div class="container">
        <a href="{{ route('magazines.create') }}" class="btn btn-success">Создать новый журнал</a>

        @if(session()->get('success'))
            <div class="alert alert-success mt-3">
                {{ session()->get('success') }}
            </div>
        @endif

        <table class="table table-striped mt-3">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Картинка</th>
                <th scope="col">Дата создания</th>
            </tr>
            </thead>
            <tbody>
            @foreach($magazines as $magazine)
                <tr>
                    <th scope="row">{{ $magazine->id }}</th>
                    <td>{{ $magazine->name }}</td>
                    <td>{{ $magazine->description}}</td>
                    <td><img src="{{ asset('storage/' . $magazine->image)  }}" alt=" " width="300"></td>
                    <td>{{ $magazine->create_date}}</td>

                    <td class="table-buttons">
                        <a href="{{ route('magazines.show', $magazine) }}" class="btn btn-success">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('magazines.edit', $magazine) }}" class="btn btn-primary">
                            <i class="fas fa-edit" ></i>
                        </a>
                        <form method="POST" action="{{ route('magazines.destroy', $magazine) }}">
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

