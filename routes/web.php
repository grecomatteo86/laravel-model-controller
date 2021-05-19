<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// route che ha come unico scopo quello di renindirizzare di default l'utente alla home page
Route::get('/', 'HomeController@index');

Route::resource('movies', 'MovieController');


