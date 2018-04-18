<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="/imageupload" method="POST" enctype="multipart/form-data">
		<input type="title" name="title">
		<input type="file" name="image">
		<label></label>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="submit" name="ok" value="Upload">
		
	</form>

	@if(Session::has('msg'))
	{{ Session::get('msg')}}
	@endif
	


</body>
</html>
