@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dettagli del Libro: {{ $book->title }}</h1>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Titolo: {{ $book->title }}</h5>cd <bo></bo>
                <p class="card-text"><strong>Autore:</strong> {{ $book->author->name }}</p>
                <p class="card-text"><strong>Categoria:</strong> {{ $book->category->name }}</p>

                <!-- Visualizza l'immagine se esiste -->
                @if ($book->image_path)
                    <div class="mt-3">
                        <strong>Immagine:</strong><br>
                        <img src="{{ Storage::url($book->image_path) }}" alt="Immagine libro" style="width: 400px; height: 520px; object-fit: cover;">
                    </div>
                    <br>
                @else
                    <p class="mt-3"><strong>Immagine non disponibile.</strong></p>
                @endif

                <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Modifica</a>

                <!-- Form per eliminare il libro -->
                <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Rimuovi</button>
                </form>
            </div>
        </div>
    </div>
@endsection
