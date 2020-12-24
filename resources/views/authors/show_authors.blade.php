@extends('layouts.app')

@section('title', $author->name)

@section('content')
    <div class="container">
       <div class="card"><h3>{{ $author->name }}</h3>
           <div class="card-body">
               <h2>Это автор:</h2>
               <h3>{{ $author->name }}</h3>
                <p>{{ $author->surname }} '' {{ $author->patronymic }}</p>
           </div>
       </div>
     </div>
@endsection
