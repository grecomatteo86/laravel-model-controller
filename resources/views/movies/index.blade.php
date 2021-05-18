@extends('layouts.base')

@section('pageTitle')
    Tutti i film
@endsection

@section('content')
    <ul>
        @foreach ($movies as $val)
            
            <a href="{{route('movies.show', ['movie' => $val -> id])}}">Film Focus</a>
            <h1>{{$val->name}}</h1>
            <h2>{{$val->author}}</h2>
            <h2>{{$val->genre}}</h2>
            <p>{{$val->description}}</p>
                
        @endforeach
    </ul>
@endsection

    

 