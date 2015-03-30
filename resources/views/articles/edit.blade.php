@extends('layouts.main')
@section('content')
    @if(count($errors))
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">
        <div class="input-field">
            <label>Title</label>
            <input type="text" name="title" value="{{ $article->title }}">
        </div>
        <div class="input-field">
            <label>Description</label>
            <textarea name="description" id="description" class="materialize-textarea">{{ $article->description }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn">Update</button>
        </div>
    </form>
@endsection
