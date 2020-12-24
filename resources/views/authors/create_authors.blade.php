@extends('layouts.app')

@section('title', 'Создать нового автора')

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

            <form method="POST" action="{{ route('authors.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" name="name"
                           value="{{ old('name') }}" class="form-control" id="name">
                </div>

                <div class="form-group">
                    <label for="surname">Фамилия</label>
                    <textarea name="surname"  class="form-control" id="surname"
                              rows="3">{{ old('surname') }}
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="patronymic">Отчество (если есть)</label>
                    <textarea name="patronymic"  class="form-control" id="patronymic"
                              rows="3">{{ old('patronymic') }}
                    </textarea>
                </div>

                <button type="submit" class="btn btn-success">Добавить автора</button>
            </form>
        </div>
    </div>
@endsection
