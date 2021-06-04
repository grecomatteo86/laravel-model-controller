<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{

    // sposto tutta la validazione all'interno di una proprietà in modo da scriverla una sola volta e pulire il codice
    protected $requestValidation = [];

    public function __construct()
    {
        $this->requestValidation = [
            'name' => 'required|string|max:100',
            'author' => 'required|string|max:50',
            'genre' => 'required|string|max:50',
            'description' => 'required|string',
        ];

        // dd($this->requestValidation);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        //dd($movies);
        
        return view ('movies.index', ['movies' => $movies]);
        // return view('movies.index',  compact['movies']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // controllo per fare in modo che se l'utente non inserisce la url dell'immagine allora venga settata quella di default
        // perchè se utente non scrive nulla nella url immagine allora il sistema lo accetta come null, che è cmq un valore.
        // invece, tramite controllo, gli diciamo che se il valore è nulla, cioè utente non ha inserito nulla nel campo, allora TOGLI dall'array questo valore
        $data = $request->all();
        if ($data['cover_image'] == null){
            unset($data['cover_image']);
        }
        // a questo punto, nella creazione del nuovo oggetto, in basso, dovremmo passare $data, che è la variabile PRIVATA della cover image

        // dd($data);

        // validazione sostituita dalla proprietà creata a hoc appena sotto

        // $request->validate([
        //     'name' => 'required|string|max:100',
        //     'author' => 'required|string|max:50',
        //     'genre' => 'required|string|max:50',
        //     'description' => 'required|string',
        // ]);

        $request->validate($this->requestValidation);

        // $movieNew = new Movie();
        
        // if(isset($data['cover_image']) && !empty($data['cover_image'])){
        //     $movieNew -> cover_image = $data['cover_image'];
        // }
        // $movieNew -> name = $data['name'];
        // $movieNew -> author = $data['author'];
        // $movieNew -> genre = $data['genre'];
        // $movieNew -> description = $data['description'];

        // $movieNew -> save();


        //creazione nuovo oggetto direttamente con i dati della request, saltando il passaggio dell'assegnazione colonna per colonna fatto sopra
        $movieNew = Movie::create($data);

        return redirect()->route('movies.show', $movieNew);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view ('movies.show', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', ['movie' => $movie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {

        // validazione sostituita dalla proprietà creata a hoc appena sotto

        // $request->validate([
        //     'name' => 'required|string|max:100',
        //     'author' => 'required|string|max:50',
        //     'genre' => 'required|string|max:50',
        //     'description' => 'required|string',
        // ]);

        $request->validate($this->requestValidation);


        // $data = $request->all();
        // $movie->update($data);

        // metodo alternativo per scrivere quanto sopra senza passare per la variabile $data
        $movie->update($request->all());

        return redirect()->route('movies.show', $movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('message', 'Il film è stato eliminato');
    }
}
