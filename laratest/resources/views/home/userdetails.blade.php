<!DOCTYPE html>
<html>
<head>
	<title>Show Users</title>
</head>
<body>

	<a href="{{route('home.index')}}">Back</a> |
	<a href="/logout">logout</a>

	<br>
		<table border="1">
			<tr>
				<td>Name</td>
				<td>{{$username}}</td>
			</tr>
			<tr>
				<td>Department</td>
				<td>{{$dept}}</td>
			</tr>
			<tr>
				<td>CGPA</td>
				<td>{{$cgpa}}</td>
			</tr>
			<tr>
				<td>Image</td>
				<td><img src="{{asset('upload/'.$profile_img)}}" width="100px" height="100px"></td>
			</tr>
		</table>
</body>
</html>