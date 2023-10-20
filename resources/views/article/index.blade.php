@extends('layouts.app')

@section('title', 'мой блог')

@section('content')
<div class="container">
    <h2>Список Статей</h2>
    @foreach($articles as $article)
    <div class="article">
        <h2>
            <a href="{{ route('articles.show', $article->id) }}">
                {{ $article->name }}
            </a>
        </h2>
        <div>
            <a href="{{ route('articles.edit', $article->id) }}" class="edit-button">Редактировать</a>
            <a href="{{ route('articles.destroy', $article->id) }}" class="delete-button" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a>
        </div>
    </div>
    <div>{{ Str::limit($article->body, 200) }}</div>
    @endforeach
</div>
@endsection