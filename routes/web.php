<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('books.index'); // Reindirizza alla lista dei libri alla home
})->name('home');

// Libri
Route::resource('books', BookController::class);

// Autori
Route::resource('authors', AuthorController::class);

// Categorie
Route::resource('categories', CategoryController::class);

