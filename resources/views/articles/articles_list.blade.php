@extends('articles.applayout')

@section('main_content')

@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@elseif (session('alert2'))
    <div class="alert alert-danger">
        {{ session('alert2') }}
    </div>
@endif

<h2>
	<a href='{{url("articles/create")}}'>Create a new article</a>
</h2>
{{-- <h2>Current preference: {{ $preference }}</h2>

<h2>Set preference:</h2>

<form action='{{ url("setpreference") }}' method="POST">
{{ csrf_field() }}
<div class="form-group">
<label>Preference:
<select class="input-group" name="preference">
	<option value="Abigail">Abigail</option>
	<option value="Maria">Maria</option>
	<option value="Sora">Sora</option>
</select>

<input type="submit" value="Set">
</form>
</label>
</div> --}}

<h3>List of Articles</h3>
<ul>
	@foreach($all_articles as $article) <!--foreach (array as member)-->
	<li><a href='{{ url("articles/$article->id")}}'> {{ $article -> title }}</a></li> <!--get member's title-->
	@endforeach
</ul>

@endsection

