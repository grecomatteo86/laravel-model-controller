<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        // renindirizza di default l'utente alla home page
        return redirect()->route('movies.index');

        //reindirizza l'utente alla pagina Api di prova
        //return view('api.prova');
    }
}
