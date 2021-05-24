<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        
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
        // dd($request);

        $request->validate([
            'name' => 'required|string|max:100',
            'author' => 'required|string|max:50',
            'genre' => 'required|string|max:50',
            'description' => 'required|string',
        ]);

        $data = $request -> all();

        //creazione nuovo oggetto direttamente con i dati della request
        $movieNew = Movie::create($data);

        // $movieNew = new Movie();
        
        // if(isset($data['cover_image']) && !empty($data['cover_image'])){
        //     $movieNew -> cover_image = $data['cover_image'];
        // }
        // $movieNew -> name = $data['name'];
        // $movieNew -> author = $data['author'];
        // $movieNew -> genre = $data['genre'];
        // $movieNew -> description = $data['description'];

        // $movieNew -> save();

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

        $request->validate([
            'name' => 'required|string|max:100',
            'author' => 'required|string|max:50',
            'genre' => 'required|string|max:50',
            'description' => 'required|string',
        ]);

        $data = $request->all();

        $movie->update($data);

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
