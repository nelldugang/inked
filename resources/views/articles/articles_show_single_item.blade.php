@extends('layouts.app')

@section('main_content')

@if (Auth::user() != null && Auth::user()->username == 'admin')


<div class="row " style="position: fixed;width:180px; bottom:0; right:15px;margin-bottom: 0;">
    <div class="z-depth-5" style="text-align: center;">
      <div class="card-panel teal " style="padding: 10px">
        <span class="white-text">Hi Admin!
        </span>
        <a class="btn red darken-4 href" onclick="return confirm('Are you sure you want to delete this article?')" href='{{url("articles/$article->id/delete")}}' style="font-size: 10px;">Delete this article</i></a><br><br>
        <a class="btn light-blue darken-4 href" href='{{url("articles/$article->id/update")}}' style="font-size: 10px">Update this article</a>
      </div>
    </div>
  </div>

@endif

<div class="container">
<h2>{{ $article->title }} <span style="font-size: 15px;font-style: italic;">Created : {{ date('F d, Y', strtotime($article->created_at)) }} </span></h2>
<img src="/images/{{ $article->image }}" style="width:180px; margin-right:25px;float:left; border: 10px solid black">

<p style="font-size: 15px">{!! $article->content !!}</p>
</div>
<br>
<div class="container">

<p>Comments</p>
    @foreach($article->comments as $comment)
    
    <ul>
    <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card-panel grey lighten-5 z-depth-1" style="padding:10px">
          <div class="row valign-wrapper" style="margin-bottom: 0">
            <div class="col s2" style="text-align: center;width: 60px;margin-left:15px">
              <img src="/uploads/{{ $comment->user->avatar }}" style="width:40px;" class="circle"><p>{{ $comment->user->name }}</p><!-- notice the "circle" class -->
            </div>
            <div class="col s9" style="margin-left: 15px">
              <span class="black-text">
                {{ $comment->description }}<p style="font-size: 12px">{{ $comment->created_at->diffForHumans() }}</p>
              </span>
              
              {{--@if( Auth::user() != null && Auth::user()->username == 'admin' || Auth::user() == $comment->user)--}}

              @if( Auth::user() == $comment->user)
              <span><a onclick="return confirm('Are you sure you want to delete this comment?')" href='{{url("articles/$comment->id/deleteComment")}}'>Delete</a>
                <li class="dropdown" style="display: inline-block;">
                <a href="#edit{{$comment->id}}" data-toggle="dropdown" role="button"  aria-expanded="false" style="font-size: 15px;">Edit</a>
                <ul class="dropdown-menu drop2">

                <form action='{{url("articles/$comment->id/updateComment")}}' method="POST">
                  {{ csrf_field() }}
                <label>Edit Comment:<textarea class="form-control" type="name" required name="commentdescription">{{$comment->description}}</textarea></label><br><input class="btn" type="submit" onclick="return alert('comment has been updated')">
                </form>

                </ul>
              </li>
            </div>


              @endif            
          
        </div>
      </div>
      </ul>

    @endforeach

@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@elseif (session('alert2'))
    <div class="alert alert-danger">
        {{ session('alert2') }}
    </div>
@endif

</div>
<br>
@if (Auth::user() == null)
<div class="container">
<h5>Hi Guest!  Please <a href="{{ route('register') }}">Register</a> or <a href="{{ route('login') }}">Login</a> to post a comment</h5>
</div>
@else
<div class="container main">
<form action="" method="POST">
		{{ csrf_field() }}
		Comment: <br>
		<textarea name='description' class="form-control" style="max-width: 300px"></textarea><br>
		<input class="btn" type="submit" onclick="return alert('comment has been updated')">
	</form>
</div>
@endif



@endsection