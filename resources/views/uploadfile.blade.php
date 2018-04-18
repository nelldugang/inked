<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="" method="POST" enctype="multipart/form-data">
	Select image to upload:
	{{ csrf_field() }}
	<input type="file" name="image">
	<input type="submit">

</form>



</body>
</html>