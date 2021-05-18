@extends('layouts.base')

@section('pageTitle')
    Aggiungi un nuovo Film
@endsection

@section('content')
    
    <div>

        <form action="">

            <div class="mb-3">
                <label for="name">Titolo</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Titolo">
            </div>

            <div class="mb-3">
                <label for="author">Regista</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Regista">
            </div>

            <div class="mb-3">
                <label for="genre">Genere</label>
                <input type="text" class="form-control" id="genre" name="genre" placeholder="Genere">
            </div>

            <div class="mb-3">
                <label for="description">Trama</label>
                <textarea class="form-control" name="description" id="description" rows="10" placeholder="Trama"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    
    </div>

@endsection