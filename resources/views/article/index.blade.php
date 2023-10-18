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
<h4>
    <a href="{{ route('articles.edit', ['id' => $article->id]) }}">Редактировать</a>
    <a href="{{ route('articles.destroy', ['id' => $article->id]) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a>
</h4>
<div>{{ Str::limit($article->body, 200) }}</div>
@endforeach
@endsection