<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>广东海翔赛鸽公棚参赛卡登录</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="/haix/Public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/haix/Public/css/xy.css" />
</head>
<body>
	<div class="panel panel-primary xy-login">
		<div class="panel-heading"><h3 class="panel-title">参赛卡获取登录</h3></div>
		<div class="panel-body">
			<form action="">
				<div class="form-group">
					<label for="">手机号码</label>
					<div>
						<input
							type="tel"
							class="form-control"
							placeholder="请输入你的号码"
						/>
					</div>
				</div>

				<div class="form-group">
					<label for="">验证码</label>
					<div class="input-group">
						<input
							type="text"
							class="form-control"
							placeholder="请输入你的验证码"
							aria-describedby="basic-addon2"
						/>
						<span class="input-group-addon xy-span xy-span__cursor1" id="basic-addon2">
							获取验证码
						</span>
					</div>
				</div>

				<button type="submit" class="btn btn-primary btn-block">登录</button>
			</form>
		</div>
	</div>

</body>
</html>