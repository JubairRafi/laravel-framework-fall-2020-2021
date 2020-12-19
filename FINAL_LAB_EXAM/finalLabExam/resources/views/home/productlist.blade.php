<!DOCTYPE html>
<html>
<head>
	<title>User list page</title>
</head>
<body>

	<h3>All User</h3>
	<a href="{{route('home.index')}}">Back</a> |
	<a href="/logout">logout</a>

	<br>
	<br>

	<table border="1">
		<tr>
			<td>ID</td>
			<td>NAME</td>
			<td>USERNAME</td>
			<td>Contact</td>
			@if(session('restrict')=='admin')
				<td>Action</td>
			@endif
		</tr>

		@for($i=0; $i < count($users); $i++)
		<tr>
			<td>{{$users[$i]['employeeid']}}</td>
			<td>{{$users[$i]['employeeName']}}</td>
			<td>{{$users[$i]['username']}}</td>
			<td>{{$users[$i]['contactNo']}}</td>
			@if(session('restrict')=='admin')
				<td>
					<a href="/details/{{$users[$i]['employeeid']}}">Details</a> |
					<a href="{{route('home.edit',$users[$i]['employeeid'])}}">Edit</a> |
					<a href="/delete/{{$users[$i]['employeeid']}}">Delete</a> 
				</td>
			@endif
		</tr>
		@endfor
	</table>

</body>
</html>

