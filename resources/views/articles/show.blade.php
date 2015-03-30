@extends('layouts.main')
@section('content')
    <h3>{{ $article->title }}</h3>
    <hr>
    <p>{{ $article->description }}</p>
@endsection
