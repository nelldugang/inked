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

	<a href='{{url("articles")}}'>Back to list of articles</a>

	<h2>{{ $article->title }}</h2>
	<!-- <p>{{ $article->created_at }}</p> -->
	<p>Created : {{ date('F d, Y', strtotime($article->created_at)) }} by



	</p>



	
	<p>{{ $article->content }}</p>	

	<a class="btn btn-danger" href='{{url("articles/$article->id/delete")}}'>Delete This article</a>
	<a class="btn btn-primary" href='{{url("articles/$article->id/update")}}'>Edit This article</a>

	<h3>Post a new Comment</h3>
	

	<form action="" method="POST">
		{{ csrf_field() }}
		Comment: <br>
		<textarea name='description' class="form-control" style="max-width: 500px"></textarea><br>
		<input class="btn btn-primary" type="submit">
	</form>

	<h3>Comments</h3>
	<ul>
		
		@foreach($article->comments as $comment)
		<li>
			<a class="btn btn-danger" href='{{url("articles/$comment->id/deleteComment")}}'><span class="glyphicon glyphicon-remove"></span></a>
			{{ $comment->description }} by {{$comment->user->name}} {{ date('F d, Y H:i', strtotime($comment->created_at)) }} 
			

			
		</li>
		
		@endforeach

	</ul>
		
@endsection	
