<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tutti i film</title>
</head>
<body>

    <h1>Tutti i film</h1>

    <ul>
        @foreach ($movies as $val)
            
            <a href="{{route('movies.show', ['movie' => $val -> id])}}">Film Focus</a>
            <h1>{{$val->name}}</h1>
            <h2>{{$val->author}}</h2>
            <h2>{{$val->genre}}</h2>
            <p>{{$val->description}}</p>
                
        @endforeach
    </ul>

    
</body>
</html>