@extends('layouts.app')

@section('title', 'мой блог')

@section('content')
    <h2>Список Статей</h2>
    @foreach ( $articles as $article)
        <h2>
            <a href="{{ route('articles.show', $article->id) }}">
                {{ $article->name }}
            </a>
        </h2>
        <div>{{ Str::limit($article->body, 200) }}</div>
    @endforeach
@endsection

