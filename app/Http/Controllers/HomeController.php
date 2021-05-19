<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// route che ha come unico scopo quello di renindirizzare di default l'utente alla home page
class HomeController extends Controller
{
    public function index()
    {
        return redirect()->route('movies.index');
    }
}
