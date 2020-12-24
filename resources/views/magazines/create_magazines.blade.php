@extends('layouts.app')

@section('title', 'Создать журнал')

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

            <form method="POST" action="{{ route('magazines.store') }}" enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <label for="magazine_name">Название журнала
                    </label>
                    <input type="text" name="name" value="{{ old('magazine_name') }}" class="form-control"
                           id="magazine_name">
                </div>
                <div class="form-group">
                    <label for="magazine_description">Описание</label>
                    <input type="text" name="description"
                           value="{{ old('magazine_description') }}" class="form-control" id="magazine_description">
                </div>
                <div class="form-group">
                    <label for="magazine_image">Изображение</label>
                    <input type="file" name="image"
                           value="{{ old('magazine_image') }}" class="form-control-file" size="30" id="magazine_image">
                </div>
            <!-- <div class="form-group">

                    <label for="magazine_authors">Автор</label>
                    <input type="text" name="author"
                           value="{{ old('magazine_authors') }}" class="form-control" id="magazine_authors">
                </div>
-->
                <div class="form-group">
                    <label for="magazine_create_date">Изображение</label>
                    <input type="date" name="create_date"
                           value="{{ old('magazine_create_date') }}" class="form-control-file"
                           id="magazine_create_date">
                </div>


            <!-- <div class="form-group">
                    <label for="exampleFormControlSelect1">Выберите автора журнала</label>
                    <select class="form-control" multiple="multiple" id="exampleFormControlSelect1" name="author_id">
                        @foreach ($authors as $key => $authorName)
                <option selected="selected" value = {{ $key }}>
                                {{  $authorName }}
                    </option>
@endforeach
                </select>

            </div>
-->

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Выберите автора журнала
                    <br>

                    @foreach ($authors as $key => $authorName)
                        <input class="form-control" id="exampleFormControlSelect1"
                               type="checkbox" name="author_id[]" value= {{ $key }}>

                        {{  $authorName }}
                        <br>
                    @endforeach
                    </label>
                </div>




                <button type="submit" class="btn btn-success">Добавить журнал</button>
            </form>
        </div>
    </div>
    <script>
        $('#exampleFormControlSelect1').on('change', function(){
            this.value = this.checked ? 1 : 0;
            //alert(this.value);
        }).change();
    </script>
@endsection
