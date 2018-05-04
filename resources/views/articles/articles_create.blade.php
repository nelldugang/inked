@extends('layouts.app')
@section('main_content')



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

<div class="container">

<a class="btn" href='{{url("articles")}}'>Go Back</a>
<h1>
	Create a new article
</h1>

<form action="" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	Title: <br><input type="text" name="title" class="form-control"><br>
	Content: <br><textarea id="content" name="content" class="form-control"></textarea><br>

	Upload an Image
	<input type="file" name="image">
	<br>
	<input class="btn" type="submit">
</form>
</div>
@endsection