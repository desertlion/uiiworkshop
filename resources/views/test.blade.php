<form method="POST" action="/test">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<label>nama</label>
<input type="text" name="nama">
<input type="submit" value="kirim">
</form>
@if($errors->any())
    <ul>
        @foreach($errors as $error)
<li>{{ $error }}</li>
        @endforeach
</ul>
@endif
