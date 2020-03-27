<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="/login/reg_do" method="post" id="form">
		<meta name="csrf-token" content="{{ csrf_token() }}">
	@csrf
		用户手机号:<input type="text" name="u_name" id="u_name"><br>
		密码:<input type="password" name="u_pwd" id="u_pwd"><br>
		确认密码:<input type="password" name="u_pwd1" id="u_pwd1"><br>
		<input type="submit" value="注册">
		<a href="{{ url('loginse') }}">已有账号,点击登陆</a>
			

	</form>
</body>
</html>