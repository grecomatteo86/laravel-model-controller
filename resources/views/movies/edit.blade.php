@extends('layouts.base')

@section('pageTitle')
    Modifica il Film {{$movie->name}}
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div>

        <form action="{{route('movies.update', ['movie' => $movie->id])}}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="cover_image">Immagine Cover</label>
                <input type="text" class="form-control" id="cover_image" name="cover_image" placeholder="Url" value="{{old('cover_image') ? old('cover_image') : $movie->cover_image}}">
            </div>

            <div class="mb-3">
                <label for="name">Titolo</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Titolo" value="{{old('name') ? old('name') : $movie->name}}">
            </div>

            <div class="mb-3">
                <label for="author">Regista</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Regista" value="{{old('author') ? old('author') : $movie->author}}">
            </div>

            <div class="mb-3">
                <label for="genre">Genere</label>
                <input type="text" class="form-control" id="genre" name="genre" placeholder="Genere" value="{{old('genre') ? old('genre') : $movie->genre}}">
            </div>

            <div class="mb-3">
                <label for="description">Trama</label>
                <textarea class="form-control" name="description" id="description" rows="10" placeholder="Trama">{{old('description') ? old('description') : $movie->description}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    
    </div>

@endsection