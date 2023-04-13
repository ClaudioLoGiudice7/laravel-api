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
                            <!-- Bottone per mostrare la finestra modale -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Elimina
                            </button>

                            <!-- Finestra modale di conferma cancellazione -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cancellazione progetto</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Sei sicuro di voler cancellare il progetto "{{ $project->name }}"?
                                                L'operazione è irreversibile!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Annulla</button>
                                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Elimina</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>

        {{ $projects->links() }}
    </section>
@endsection
