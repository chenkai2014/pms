<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>社区管理系统</title>
</head>
<body>
<div>
	<span>社区管理系统</span>
	<form method="post" action="/index.php/Welcome/login">
		用户名：<input type="text" name="username">
		密码：<input type="text" name="password">
		<input type="submit" value="登录">
	</form>

</div>


</body>
</html>