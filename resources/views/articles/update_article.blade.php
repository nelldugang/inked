@extends('layouts.app')

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

<div class="container">

	<a class="btn btn-default" href='{{url("articles/$article->id")}}'>Back to articles</a>

	<h2>Update Article</h2>

	<form enctype="multipart/form-data" action='{{url("articles/$article->id/updateArticles")}}' method="POST">


	Title:

	<input type="text"  name="title" value='{{ $article->title }}' class="form-control title"><br>
	<br>
	Content:
	<textarea type="text" id="content" name="content" value='' class="form-control" id="content" style="height:100px">{{ $article->content }}</textarea><br>

	<img src="/images/{{ $article->image }}" style="width:200px; margin right:25px">

	<input type="file" name="image">
    
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="submit" name="update" class="btn btn-primary" onclick="return alert('Article Has been updated')">
	</form>
</div>
@endsection	