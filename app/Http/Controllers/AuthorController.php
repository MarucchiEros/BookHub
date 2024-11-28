<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthorController extends Controller
{
    public function index(): View
    {
        // Recupera tutti gli autori ordinati per nome
        $authors = Author::orderBy('name')->get();

        // Passa gli autori alla vista 'authors.index'
        return view('authors.index', compact('authors'));
    }

    public function create(): View
    {
        return view('authors.create');
    }

    public function store(StoreAuthorRequest $request): RedirectResponse
    {
        Author::create($request->validated());
        return redirect()->route('authors.index')->with('success', 'Autore aggiunto correttamente');
    }

    public function edit(Author $author): View
    {
        return view('authors.edit', compact('author'));
    }

    public function update(StoreAuthorRequest $request, Author $author): RedirectResponse
    {
        $author->update($request->validated());
        return redirect()->route('authors.index')->with('success', 'Autore aggiornato correttamente');
    }

    public function destroy(Author $author): RedirectResponse
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Autore rimosso correttamente');
    }
}

