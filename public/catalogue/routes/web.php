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

Route::get('/projet', function () {
    // return view('welcome');
    // 2eme facon
    return view('template');
});

Route::get('/nom/{nom}/prenom/{prenom}', function ($nom, $prenom) {
    echo $nom . " " . $prenom;
});

Route::get('/', function () {
    // return view('welcome');
    // 2eme facon
    return "Hello World";
});

Route::get('/title/{title}', function($title) {
    echo $title;
})->where('title', '^[A-Za-z]*$');
