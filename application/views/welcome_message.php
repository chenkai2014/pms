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

	<span>用户注册</span>
	<form method="post" action="/index.php/Welcome/register">
		用户名：<input type="text" name="username"><br />
		密码：<input type="text" name="password"><br />
		真实姓名：<input type="text" name="name"><br />
		手机号：<input type="text" name="mobile"><br />
		楼宇号：<input type="text" name="building_id"><br />
		详细地址(23号601室)：<input type="text" name="address_detail"><br />
		<input type="submit" value="注册"><br />
	</form>

</div>
</body>
<script src="<?php echo base_url(); ?>/jquery/jquery.js"></script>
</html>