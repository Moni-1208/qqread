<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
        <h1>login</h1>
</head>
<body>
	<form>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		@csrf
		用户名:<input type="text" name="u_name" id="u_name"><br>
		  密码:<input type="password" name="u_pwd" id="u_pwd"><br>
		<input type="submit" value="登陆" ><br>
		<a href="{{ url('redse') }}">点击注册</a>
	</form>
</body>
</html>