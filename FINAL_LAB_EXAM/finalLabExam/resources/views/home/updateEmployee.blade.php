<!DOCTYPE html>
<html>
<head>
	<title>Update Employee Page</title>
</head>
<body>
	<a href="{{route('home.employeelist')}}">Back</a> |
	<a href="/logout">logout</a>
	<br>
	
		<form method="post" enctype="multipart/form-data">

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<fieldset>
				<legend>Delete User</legend>
			<table>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" value="{{$username}}"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" value="{{$password}}"></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" value="{{$employeeName}}"></td>
				</tr>
				<tr>
					<td>Contact</td>
					<td><input type="text" name="contact" value="{{$contactNo}}"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Update"></td>
				</tr>
			</table>
			</fieldset>
		</form>

		@foreach($errors->all() as $err)
			{{$err}} <br>
		@endforeach
</body>
</html>