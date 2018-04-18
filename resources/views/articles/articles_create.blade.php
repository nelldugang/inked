@extends('articles.applayout')
@section('main_content')

<a href='{{url("articles")}}'>Back</a>

@if (count($errors) > 0)
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif	

@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@elseif (session('alert2'))
    <div class="alert alert-danger">
        {{ session('alert2') }}
    </div>
@endif


<h1>
	Create a new article
</h1>

<form action='' method="POST" enctype="multipart/form-data">
	
	Title: <br><input type:"text" name="title" class="form-control"><br>
	Content: <br><textarea name="content" class="form-control"></textarea><br>

	<input type="file" name="image">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="submit">
</form>
@endsection