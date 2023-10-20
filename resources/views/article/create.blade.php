@extends('layouts.app')

@section('title', 'мой блог')

@section('content')
@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{ Form::model($article, ['route' => 'articles.store']) }}
@include('article.form')
{{ Form::submit('Создать') }}
{{ Form::close() }}
@endsection