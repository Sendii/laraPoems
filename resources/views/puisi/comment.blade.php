<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h4>{{$puisis->isi}}</h4>
	<b>|</b>
	<h3></h3>

	<form method="POST" action="{{route('puisi_postcomment')}}">
		@csrf
		<input type="hidden" name="id" value="{{$puisis->id}}">
		<textarea name="comment">sasa</textarea><br>
		<button type="submit">Kirim komen</button>
	</form>
</body>
</html>