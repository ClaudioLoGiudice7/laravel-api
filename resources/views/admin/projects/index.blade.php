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
                    <th scope="col">Linguaggi usati</th>
                    <th scope="col">Dettagli</th>
                    <th scope="col">Modifica</th>
                    <th scope="col">Elimina</th>
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
                        <td>
                            <a href="{{ route('admin.projects.edit', ['project' => $project]) }}">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.projects.destroy', ['project' => $project]) }}">
                                <i class="bi bi-trash"></i>
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
