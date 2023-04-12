@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crea nuovo progetto</h1>

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
                <label for="name">Nome del progetto</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea name="description" id="description" rows="3" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="start_date">Data di inizio</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="end_date">Data di fine</label>
                <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Crea progetto</button>
        </form>
    </div>
@endsection
