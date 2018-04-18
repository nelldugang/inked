@extends('layouts.app')

@section('content')
<div class="container">
<h2>{{ $article->title }} <span style="font-size: 15px">Created : {{ date('F d, Y', strtotime($article->created_at)) }} credits to <a href="https://www.facebook.com/chino.daquigan" target="_blank">Chino</a></span></h2>
<img src="/images/{{ $article->image }}" style="width:400px; margin-right:25px;float:left; border: 10px solid black">

<p style="font-size: 16px">{{ $article->content }}</p>
</div>
<br>
<div class="container">

<p>Comments</p>
    @foreach($article->comments as $comment)
 <ul>

    <img src="/uploads/{{ $comment->user->avatar }}" style="width:40px; margin right:25px;border-radius: 50%;margin-right: 10px">
    <strong style="font-size: 16px">{{$comment->user->name}}</strong>
    <span style="background-color: white;padding:10px;border-radius: 20px">{{ $comment->description }} </span>
    {{ $comment->created_at->diffForHumans() }} 
    </ul>
    @endforeach

</div>
<br>
<div class="container">
<form action="" method="POST">
		{{ csrf_field() }}
		Comment: <br>
		<textarea name='description' class="form-control" style="max-width: 300px"></textarea><br>
		<input class="btn btn-primary" type="submit">
	</form>
</div>



@endsection