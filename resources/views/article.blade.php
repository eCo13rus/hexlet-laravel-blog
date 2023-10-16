@extends('layouts.app')

@section('title', 'О блоге')

@section('content')

@foreach ( $articles as $article)
<h1>{{ $article->name }}</h1>
<div>{{ $article->body }}</div>
@endforeach

@endsection