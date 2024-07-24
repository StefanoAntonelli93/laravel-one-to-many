@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="content d-flex justify-content-between align-items-center">
            <h2 class="py-3">Dettagli del Progetto</h2>
            {{-- vai a index --}}
            <a href="{{ route('admin.projects.index') }}"><button class="btn btn-primary btn-sm">Torna ai
                    progetti</button></a>
        </div>


        @if ($project)
            @if ($project->cover_image)
                <div>
                    <img class="w-50" src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->name }}">
                </div>
            @endif
            <p>Nome: {{ $project->name }}</p>
            <p>Data inizio progetto: {{ $project->project_start_date }}</p>
            <p>Data fine progetto: {{ $project->project_end_date }}</p>
            <p>Status: {{ ucfirst($project->status) }}</p>
            <p>Budget: {{ $project->budget }}</p>
            <p>Project Manager: {{ $project->project_manager }}</p>
            <p>Cliente: {{ $project->customer }}</p>
            <p>Descrizione: {{ $project->description }}</p>
        @else
            <p>Progetto non trovato.</p>
        @endif

    </div>
@endsection
