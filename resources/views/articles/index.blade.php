@extends('layouts.main')
@section('content')
    <ul class="collection">
        @foreach($articles as $article)
        <li class="collection-item" style="overflow: hidden;">
            <a href="{{ url('articles') }}/{{ $article->id }}">{{ $article->title }}</a>
            <form class="right" method="POST" action="{{ route('articles.destroy', $article->id) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">
                <a href="{{ url('articles') }}/{{$article->id}}/edit" class="btn waves-effect waves-light">Edit</a>
                <button type="submit" class="btn waves-effect waves-light">Delete</button>
            </form>
        </li>
        @endforeach
    </ul>
@endsection
