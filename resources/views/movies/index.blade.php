@extends('layouts.base')

@section('pageTitle')
    Tutti i film
@endsection

@section('content')

    <div class="text-right">
        <a href="{{route('movies.create')}}">
            <button type="button" class="btn btn-success">Aggiungi Film</button>
        </a>
    </div>

    <table class="table">

        <thead>
            
            <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Regista</th>
                <th scope="col">Genere</th>
                <th scope="col">Azioni</th>
            </tr>
        
        </thead>

        <tbody>

        @foreach ($movies as $val)

            <tr>

                <td>{{$val->name}}</td>
                <td>{{$val->author}}</td>
                <td>{{$val->genre}}</td>
                <td>
                    <a href="{{route('movies.show', ['movie' => $val -> id])}}">
                        <button type="button" class="btn btn-primary">Film Focus</button>
                    </a>
                </td>

            </tr>
            
                
        @endforeach

        </tbody>

    </table>

@endsection

    

 