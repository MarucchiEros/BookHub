@extends('layouts.app')

@section('content')
    <h1>{{ $category->name }}</h1>

    <p><strong>Dettagli:</strong></p>
    <ul>
        <li><strong>ID:</strong> {{ $category->id }}</li>
        <li><strong>Nome:</strong> {{ $category->name }}</li>
    </ul>

    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Modifica</a>
    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Elimina</button>
    </form>

    <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Torna alla lista</a>
@endsection
