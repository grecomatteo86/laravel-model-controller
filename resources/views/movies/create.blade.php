@extends('layouts.base')

@section('pageTitle')
    Aggiungi un nuovo Film
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

        <form action="{{route('movies.store')}}" method="POST">
            @method('POST')
            @csrf

            <div class="mb-3">
                <label for="name">Titolo</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Titolo" required>
            </div>

            <div class="mb-3">
                <label for="author">Regista</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Regista" required>
            </div>

            <div class="mb-3">
                <label for="genre">Genere</label>
                <input type="text" class="form-control" id="genre" name="genre" placeholder="Genere" required>
            </div>

            <div class="mb-3">
                <label for="description">Trama</label>
                <textarea class="form-control" name="description" id="description" rows="10" placeholder="Trama" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    
    </div>

@endsection