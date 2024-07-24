@extends('layouts.app')
@section('content')
    <div class="container py-4">
        <div class="content d-flex justify-content-between align-items-center">
            <h2 class="py-3">Modifica progetto </h2>
            {{-- vai a index --}}
            <a href="{{ route('admin.projects.index') }}"><button class="btn btn-primary btn-sm">Torna ai
                    progetti</button></a>
        </div>
        {{-- includo errors.blade.php per mostrare errori --}}
        @include('shared.errors')

        {{-- form --}}
        <form action="{{ route('admin.projects.update', $project) }}" method="POST">

            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="project-name" class="form-label">Nome progetto</label>
                <input type="text" class="form-control" id="project-name" name="name"
                    value="{{ old('name', $project->name) }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea rows="4" type="text" class="form-control" id="description" name="description">{{ old('description', $project->description) }}</textarea>
            </div>

            {{-- form check --}}
            <div class="py-3 d-flex gap-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_in_corso" value="in_corso">
                    <label class="form-check-label" for="status_in_corso">
                        In corso
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_completato" value="completato">
                    <label class="form-check-label" for="status_completato">
                        Completato
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_in_attesa" value="in_attesa"
                        checked>
                    <label class="form-check-label" for="status_in_attesa">
                        In attesa
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_cancellato" value="cancellato">
                    <label class="form-check-label" for="status_cancellato">
                        Cancellato
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Modifica progetto </button>
        </form>
    </div>
@endsection
