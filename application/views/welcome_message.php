<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<title>社区管理系统</title>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h1>社区管理系统</h1>
			<form method="post" action="/index.php/Welcome/login">
				<div class="form-group">
					用户名：<input type="text" class="form-control" name="username">
				</div>
				<div class="form-group">
					密码：<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group">
					<input class="btn btn-primary"  type="submit" value="登录">
				</div>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
<script src="<?php echo base_url(); ?>/jquery/jquery.js"></script>
<script src="<?php echo base_url(); ?>/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>