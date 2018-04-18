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

	<a href='{{url("articles/$article->id")}}'>Back to articles</a>

	<h1>Update Article</h1>

	<form enctype="multipart/form-data" action='{{url("articles/$article->id/updateArticles")}}' method="POST">
	Title:
	<input type="" name="title" value='{{ $article->title }}' class="form-control input-lg">
	<br>
	Content:
	<textarea type="text" name="content" value='' class="form-control" style="height:100px">{{ $article->content }}</textarea><br>

	<img src="/images/{{ $article->image }}" style="width:300px; margin right:25px">

	<input type="file" name="image">
	<input type="file" name="image2">
    
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="submit" name="update" class="btn btn-primary">
	</form>

@endsection	