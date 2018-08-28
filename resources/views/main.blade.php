@section('title', 'test')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
@yield('title')
	 </title>
</head>
<body>
	<form action="/public/main" method="post">
	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="text" name="password" /></td>
			<tr>
				<td colspan="2" align="center"></td>
				<input type="submit" value="Save">
			</tr>
		</tr>
	</table>	
	</form>
</body>
</html>