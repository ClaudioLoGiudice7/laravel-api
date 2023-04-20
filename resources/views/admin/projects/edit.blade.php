@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Modifica progetto</h1>

        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="mb-1">Nome del progetto</label>
                <input type="text" name="name" id="name" class="form-control mb-3" value="{{ $project->name }}"
                    required>
            </div>

            <div class="form-group">
                <label for="description" class="mb-1">Descrizione</label>
                <textarea name="description" id="description" rows="3" class="form-control mb-3">{{ $project->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="technology_used" class="mb-1">Linguaggi usati</label>
                <input type="text" name="technology_used" id="technology_used" class="form-control mb-3"
                    value="{{ $project->technology_used }}" required>
            </div>

            <div class="form-group">
                <label for="category_id" class="mb-1">Categoria</label>
                <select name="category_id" id="category_id" class="form-select mb-3">
                    <option value="">Non categorizzato</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $project->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->label }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-outline-primary mt-2">
                Modifica progetto
            </button>
        </form>
    </div>
@endsection
