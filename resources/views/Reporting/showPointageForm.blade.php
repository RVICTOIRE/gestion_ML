@extends('base')

@section('title', $post->title)

@section('content')
<div class="container mt-5">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <small>Publié le {{ $post->created_at->format('d M Y à H:i') }}</small>

    <div class="mt-4">
        <a href="{{ route('Reporting.index') }}" class="btn btn-primary">Retour à la liste des articles</a>
    </div>
</div>
@endsection