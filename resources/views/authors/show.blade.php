@extends('layouts.app')

@section('content')
    <h1>{{ $author->name }}</h1>

    <p><strong>Dettagli:</strong></p>
    <ul>
        <li><strong>ID:</strong>     {{ $author->id }}</li>
        <li><strong>Nome:</strong> {{ $author->name }}</li>
    </ul>

    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Modifica</a>


    <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Elimina</button>
    </form>

    <a href="{{ route('authors.index') }}" class="btn btn-secondary mt-3">Torna alla lista</a>

    <script>
        function confirmDelete() {
            return confirm("Sei sicuro di voler eliminare questo autore?");
        }
    </script>
@endsection
