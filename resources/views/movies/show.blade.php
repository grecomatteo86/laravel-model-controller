@extends('layouts.base')

@section('pageTitle')
    {{$movie->name}}
@endsection

@section('content')
    <h2>{{$movie->author}}</h2>
    <h2>{{$movie->genre}}</h2>
    <p>{{$movie->description}}</p>
    <a href="{{route('movies.index')}}">Tutti i film</a>
@endsection