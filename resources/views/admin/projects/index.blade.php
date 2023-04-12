@extends('layouts.app')

@section('title', 'Progetti')


@section('content')
    <section>
        <form action="{{ route('admin.projects.create') }}" method="GET">
            <button type="submit" class="btn btn-primary mb-4">Crea nuovo progetto</button>
        </form>
        {{-- @dump($projects) --}}

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Linguaggio usato</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->getDescription() }}</td>
                        <td>{{ $project->technology_used }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project) }}">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>

        {{ $projects->links() }}
    </section>
@endsection
