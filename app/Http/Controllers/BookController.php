<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    public function index(): View
    {
        // Recupera tutti i libri, includendo anche autore e categoria
        $books = Book::with(['author', 'category'])->orderBy('title')->get();

        // Passa i libri alla vista 'books.index'
        return view('books.index', compact('books'));
    }

    public function create(): View
    {
        // Recupera tutti gli autori e le categorie
        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact('authors', 'categories')); // Vista per creare un nuovo libro
    }

    public function store(StoreBookRequest $request): RedirectResponse
    {
        // Ottieni i dati validati dalla richiesta
        $validated = $request->validated();

        // Gestione dell'immagine
        if ($request->hasFile('image')) {
            // Salva l'immagine originale
            $image = $request->file('image');

            // Salva l'immagine nella cartella 'books_images' senza ridimensionarla
            $imagePath = $image->store('books_images', 'public');

            // Aggiungi il percorso dell'immagine ai dati validati
            $validated['image_path'] = $imagePath;
        }

        // Crea il libro con i dati validati e l'immagine (se presente)
        Book::create($validated);

        return redirect()->route('home')->with('success', 'Libro aggiunto correttamente');
    }

    public function edit(Book $book): View
    {
        // Recupera tutti gli autori e le categorie
        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('books.edit', compact('book', 'authors', 'categories')); // Vista per modificare un libro esistente
    }

    public function update(StoreBookRequest $request, Book $book): RedirectResponse
    {
        // Ottieni i dati validati dalla richiesta
        $validated = $request->validated();

        // Gestione dell'immagine
        if ($request->hasFile('image')) {
            // Se c'era già un'immagine, rimuovila
            if ($book->image_path) {
                Storage::disk('public')->delete($book->image_path);
            }

            // Salva la nuova immagine senza ridimensionarla
            $image = $request->file('image');

            // Salva l'immagine nella cartella 'books_images'
            $imagePath = $image->store('books_images', 'public');

            // Aggiungi il percorso dell'immagine ai dati validati
            $validated['image_path'] = $imagePath;
        }

        // Aggiorna il libro con i dati validati e l'immagine (se presente)
        $book->update($validated);

        // Redirect con messaggio di successo
        return redirect()->route('home')->with('success', 'Libro aggiornato correttamente');
    }

    public function show(Book $book): View
    {
        return view('books.show', compact('book')); // Passa il libro alla vista 'books.show'
    }

    public function destroy(Book $book): RedirectResponse
    {
        // Se c'è un'immagine associata, rimuovila
        if ($book->image_path) {
            Storage::disk('public')->delete($book->image_path);
        }

        // Elimina il libro dal database
        $book->delete();

        return redirect()->route('home')->with('success', 'Libro rimosso correttamente');
    }
}
