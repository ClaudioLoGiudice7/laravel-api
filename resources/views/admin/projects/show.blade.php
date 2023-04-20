@extends('layouts.app')

@section('title', $project->name)

@section('content')
    <section>
        <p>{{ $project->description }}</p>
        <h2>Tecnologie utilizzate:</h2>
        @if ($project->technologies->count() > 0)
            <ul>
                @foreach ($project->technologies as $technology)
                    <li>{{ $technology->name }}</li>
                @endforeach
            </ul>
        @else
            <p>Non sono state utilizzate tecnologie per questo progetto.</p>
        @endif
        <h3 class="mb-3">{{ $project->technology_used }}</h3>
        <h6 class="mb-5">{{ $project->start_date }}</h6>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-info">Torna alla lista</a>
    </section>
@endsection
