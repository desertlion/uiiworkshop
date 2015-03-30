@extends('layouts.main')
@section('content')
    @if(count($errors))
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form method="POST" action="{{ route('articles.store') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="input-field">
            <label>Title</label>
            <input type="text" name="title">
        </div>
        <div class="input-field">
            <label>Description</label>
            <textarea name="description" id="description" class="materialize-textarea"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn">Create</button>
        </div>
    </form>
@endsection
