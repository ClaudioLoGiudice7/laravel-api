@extends('layouts.app')

@section('title', $project->name)

@section('content')
    <section>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-info">Torna alla lista</a>
        <h6>{{ $project->start_date }}</h6>
        <h3>{{ $project->technology_used }}</h3>
        <p>{{ $project->description }}</p>
    </section>
@endsection
