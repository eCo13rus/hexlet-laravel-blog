@extends('layouts.app')

@section('title', 'О блоге')

@section('content')
<h1>{{$article->name}}</h1>
<div>{{$article->body}}</div>
@endsection