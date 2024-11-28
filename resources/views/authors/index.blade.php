@extends('layouts.app')

@section('content')
    <h1>Elenco Autori</h1>

    <!-- Mostra messaggio di successo se c'è -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Mostra messaggio di errore se c'è -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('authors.create') }}" class="btn btn-primary">Aggiungi Nuovo Autore</a>

    <table class="table mt-3">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Azioni</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->name }}</td>
                <td>
                    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning btn-sm">Modifica</a>
                    <!-- Aggiungi conferma per eliminazione -->
                    <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
