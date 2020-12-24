@extends('layouts.app')

@section('title', 'Изменить данные автора $author->name ' )

@section('content')
    <div class="row">
        <div class="col-lg-6 mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('authors.update', $author) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="category-title">Имя</label>
                    <input type="text" name="name"
                           value="{{ $author->name }}" class="form-control" id="category-name">
                </div>

                <div class="form-group">
                    <label for="category-title">Фамилия</label>
                    <input type="text" name="surname"
                           value="{{ $author->surname }}" class="form-control" id="category-name">
                </div>

                <div class="form-group">
                    <label for="category-title">Отчество (не обязательно)</label>
                    <input type="text" name="patronymic"
                           value="{{ $author->patronymic }}" class="form-control" id="category-name">
                </div>


                <button type="submit" class="btn btn-success">Отредактировать автора</button>
            </form>
        </div>
    </div>
@endsection

