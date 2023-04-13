@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Crea nuovo progetto</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="mb-1">Nome</label>
                <input type="text" name="name" id="name" class="form-control mb-3" required>
            </div>

            <div class="form-group">
                <label for="description" class="mb-1">Descrizione</label>
                <textarea name="description" id="description" rows="3" class="form-control mb-3"></textarea>
            </div>

            <div class="form-group">
                <label for="image" class="mb-1">Immagine</label>
                <input type="text" name="image" id="image" class="form-control mb-3" required>
            </div>

            <div class="form-group">
                <label for="technology_used" class="mb-1">Linguaggi usati</label>
                <input type="text" name="technology_used" id="technology_used" class="form-control mb-3" required>
            </div>

            <div class="form-group">
                <label for="start_date" class="mb-1">Data di inizio</label>
                <input type="date" name="start_date" id="start_date" class="form-control mb-3" required>
            </div>

            <button type="submit" class="btn btn-outline-primary mt-2">Crea progetto</button>
        </form>
    </div>
@endsection
